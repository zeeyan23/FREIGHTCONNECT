# ============================================
# FreightConnect - Laravel Deployment Script
# ============================================

$ErrorActionPreference = "Stop"

# ---------- LOCAL ----------
$ProjectPath = "D:\globaltrading"
$DeployTemp = "$ProjectPath\deploy_temp"
$ZipFile = "$ProjectPath\freightconnect_deploy.zip"

# ---------- SERVER ----------
$ServerUser = "u948060652"
$ServerHost = "82.112.229.222"
$ServerPort = "65002"
$KeyFile = "$ProjectPath\freightconnect.ppk"

$ServerProject = "/home/u948060652/freightconnect"
$ServerPublic = "/home/u948060652/domains/freightconnect.info/public_html"
$ServerZip = "$ServerProject/freightconnect_deploy.zip"

# ---------- PU TTY ----------
$PSCP = "C:\Program Files\PuTTY\pscp.exe"
$PLINK = "C:\Program Files\PuTTY\plink.exe"


Write-Host ""
Write-Host "============================================" -ForegroundColor Cyan
Write-Host "   FreightConnect Deployment Started" -ForegroundColor Cyan
Write-Host "============================================" -ForegroundColor Cyan
Write-Host ""

# Check required files
if (!(Test-Path $PSCP)) {
    throw "PSCP not found: $PSCP"
}

if (!(Test-Path $PLINK)) {
    throw "PLINK not found: $PLINK"
}

if (!(Test-Path $KeyFile)) {
    throw "Private key not found: $KeyFile"
}

# ============================================
# 1. Clean deployment folder
# ============================================

Write-Host "[1/7] Preparing deployment package..." -ForegroundColor Yellow

if (Test-Path $DeployTemp) {
    Remove-Item $DeployTemp -Recurse -Force
}

New-Item -ItemType Directory -Path $DeployTemp | Out-Null

# ============================================
# 2. Copy project while excluding server-only files
# ============================================

Write-Host "[2/7] Copying project files..." -ForegroundColor Yellow

robocopy $ProjectPath $DeployTemp /E `
    /XD `
        ".git" `
        "node_modules" `
        "vendor" `
        "storage" `
        "deploy_temp" `
    /XF `
        ".env" `
        "freightconnect_deploy.zip" `
        "deploy.ps1" `
    /NFL /NDL /NJH /NJS /NP

# Robocopy returns codes 0-7 for success/non-fatal differences
if ($LASTEXITCODE -gt 7) {
    throw "Robocopy failed with exit code $LASTEXITCODE"
}

# Verify required migration files were copied
$MigrationPath = "$DeployTemp\database\migrations"

if (!(Test-Path "$MigrationPath\2026_09_05_101439_add_trader_fields_to_trader_member_account_table.php")) {
    throw "Migration file missing from deployment package: add_trader_fields_to_trader_member_account_table.php"
}

if (!(Test-Path "$MigrationPath\2026_09_05_102713_update_phone_fields_in_trader_member_account_table.php")) {
    throw "Migration file missing from deployment package: update_phone_fields_in_trader_member_account_table.php"
}

Write-Host "Migration files verified successfully." -ForegroundColor Green

# ============================================
# 3. Create ZIP
# ============================================

Write-Host "[3/7] Creating deployment ZIP..." -ForegroundColor Yellow

if (Test-Path $ZipFile) {
    Remove-Item $ZipFile -Force
}

# Create ZIP with Linux-compatible forward-slash paths
Add-Type -AssemblyName System.IO.Compression
Add-Type -AssemblyName System.IO.Compression.FileSystem

$Zip = [System.IO.Compression.ZipFile]::Open(
    $ZipFile,
    [System.IO.Compression.ZipArchiveMode]::Create
)

try {
    Get-ChildItem -Path $DeployTemp -Recurse -File | ForEach-Object {

        $RelativePath = $_.FullName.Substring($DeployTemp.Length + 1)
        $EntryName = $RelativePath -replace '\\', '/'

        $Entry = $Zip.CreateEntry(
            $EntryName,
            [System.IO.Compression.CompressionLevel]::Optimal
        )

        $EntryStream = $Entry.Open()

        try {
            $FileStream = [System.IO.File]::OpenRead($_.FullName)

            try {
                $FileStream.CopyTo($EntryStream)
            }
            finally {
                $FileStream.Dispose()
            }
        }
        finally {
            $EntryStream.Dispose()
        }
    }
}
finally {
    $Zip.Dispose()
}

# Clean temporary folder
Remove-Item $DeployTemp -Recurse -Force
Write-Host "Deployment ZIP created at: $ZipFile" -ForegroundColor Green

# ============================================
# 4. Upload ZIP
# ============================================

Write-Host "[4/7] Uploading files to server..." -ForegroundColor Yellow

& $PSCP `
    -P $ServerPort `
    -i $KeyFile `
    $ZipFile `
    "${ServerUser}@${ServerHost}:${ServerZip}"

if ($LASTEXITCODE -ne 0) {
    throw "File upload failed."
}

# ============================================
# 5. Extract and deploy on server
# ============================================

Write-Host "[5/7] Deploying files on server..." -ForegroundColor Yellow

$RemoteCommands = @"
set -e

echo "Extracting deployment package..."

cd $ServerProject

unzip -o freightconnect_deploy.zip

rm -f freightconnect_deploy.zip

echo "Running migrations..."

/usr/bin/php artisan migrate --force

echo "Clearing Laravel cache..."

/usr/bin/php artisan optimize:clear

echo "Caching Laravel configuration..."

/usr/bin/php artisan config:cache

echo "Syncing public files..."

cp -a $ServerProject/public/. $ServerPublic/

echo "Deployment completed successfully."
"@

& $PLINK `
    -P $ServerPort `
    -i $KeyFile `
    "${ServerUser}@${ServerHost}" `
    $RemoteCommands

if ($LASTEXITCODE -ne 0) {
    throw "Server deployment failed."
}

# ============================================
# 6. Remove local ZIP
# ============================================

Write-Host "[6/7] Cleaning local files..." -ForegroundColor Yellow

# Keep ZIP for debugging
Write-Host "ZIP kept for inspection: $ZipFile" -ForegroundColor Yellow

# ============================================
# 7. Finished
# ============================================

Write-Host ""
Write-Host "============================================" -ForegroundColor Green
Write-Host "   DEPLOYMENT SUCCESSFUL" -ForegroundColor Green
Write-Host "============================================" -ForegroundColor Green
Write-Host ""
Write-Host "Live site: https://freightconnect.info" -ForegroundColor Cyan
Write-Host ""