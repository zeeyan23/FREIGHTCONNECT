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

# ============================================

# Check required files

# ============================================

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

# 2. Copy project files

# ============================================

Write-Host "[2/7] Copying project files..." -ForegroundColor Yellow

robocopy $ProjectPath $DeployTemp /E /XD ".git" "node_modules" "vendor" "storage" "deploy_temp" /XF ".env" "freightconnect_deploy.zip" "deploy.ps1" "freightconnect.ppk" "New Text Document.txt" "bootstrap\cache\config.php" /NFL /NDL /NJH /NJS /NP
Remove-Item "$DeployTemp\bootstrap\cache\config.php" -Force -ErrorAction SilentlyContinue

if ($LASTEXITCODE -gt 7) {
throw "Robocopy failed with exit code $LASTEXITCODE"
}

# ============================================

# Verify migration files

# ============================================

$MigrationPath = "$DeployTemp\database\migrations"

if (!(Test-Path "$MigrationPath\2026_09_05_101439_add_trader_fields_to_trader_member_account_table.php")) {
throw "Migration file missing from deployment package."
}

if (!(Test-Path "$MigrationPath\2026_09_05_102713_update_phone_fields_in_trader_member_account_table.php")) {
throw "Migration file missing from deployment package."
}

Write-Host "Migration files verified successfully." -ForegroundColor Green

# ============================================
# 3. Create ZIP
# ============================================

Write-Host "[3/7] Creating deployment ZIP..." -ForegroundColor Yellow

if (Test-Path $ZipFile) {
    Remove-Item $ZipFile -Force
}

Push-Location $DeployTemp

try {
    Compress-Archive -Path * -DestinationPath $ZipFile -CompressionLevel Optimal
}
finally {
    Pop-Location
}

if (!(Test-Path $ZipFile)) {
    throw "Failed to create deployment ZIP."
}

# Verify ZIP contains artisan at root
$ZipCheck = [System.IO.Compression.ZipFile]::OpenRead($ZipFile)

try {
    $ArtisanEntry = $ZipCheck.Entries |
        Where-Object { $_.FullName -eq "artisan" }
}
finally {
    $ZipCheck.Dispose()
}

if (!$ArtisanEntry) {
    throw "Invalid ZIP structure: artisan is not at ZIP root."
}

Write-Host "ZIP structure verified successfully." -ForegroundColor Green

Remove-Item $DeployTemp -Recurse -Force

Write-Host "Deployment ZIP created at: $ZipFile" -ForegroundColor Green

# ============================================

# 4. Upload ZIP

# ============================================

Write-Host "[4/7] Uploading files to server..." -ForegroundColor Yellow

& $PSCP -P $ServerPort -i $KeyFile $ZipFile "${ServerUser}@${ServerHost}:${ServerZip}"

if ($LASTEXITCODE -ne 0) {
throw "File upload failed."
}

Write-Host "Upload completed successfully." -ForegroundColor Green

# ============================================
# 5. Deploy on server
# ============================================

Write-Host "[5/7] Deploying files on server..." -ForegroundColor Yellow

$RemoteCommands = @"
cd $ServerProject

echo "Extracting deployment package..."

unzip -o freightconnect_deploy.zip
echo "ZIP extraction finished."

echo "Removing deployment ZIP..."
rm -f freightconnect_deploy.zip

echo "Clearing old Laravel configuration cache..."
rm -f bootstrap/cache/config.php

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to remove config cache."
    exit 1
fi

echo "Running migrations..."
/usr/bin/php artisan migrate --force

if [ `$? -ne 0 ]; then
    echo "ERROR: Migration failed."
    exit 1
fi

echo "Clearing Laravel cache..."
/usr/bin/php artisan optimize:clear

if [ `$? -ne 0 ]; then
    echo "ERROR: optimize:clear failed."
    exit 1
fi

echo "Caching Laravel configuration..."
/usr/bin/php artisan config:cache

if [ `$? -ne 0 ]; then
    echo "ERROR: config:cache failed."
    exit 1
fi

echo "Syncing public files..."

cp -a $ServerProject/public/build $ServerPublic/

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to sync build."
    exit 1
fi

cp -a $ServerProject/public/css $ServerPublic/

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to sync CSS."
    exit 1
fi

cp -a $ServerProject/public/images $ServerPublic/

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to sync images."
    exit 1
fi

cp -a $ServerProject/public/videos $ServerPublic/

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to sync videos."
    exit 1
fi

cp $ServerProject/public/.htaccess $ServerPublic/.htaccess

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to copy .htaccess."
    exit 1
fi

cp $ServerProject/public/favicon.ico $ServerPublic/favicon.ico

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to copy favicon."
    exit 1
fi

cp $ServerProject/public/robots.txt $ServerPublic/robots.txt

if [ `$? -ne 0 ]; then
    echo "ERROR: Failed to copy robots.txt."
    exit 1
fi

echo "Production index.php preserved."

echo "Deployment completed successfully."
"@

$RemoteCommands = $RemoteCommands -replace "`r`n", "`n"

& $PLINK -P $ServerPort -i $KeyFile "${ServerUser}@${ServerHost}" $RemoteCommands

if ($LASTEXITCODE -ne 0) {
    throw "Server deployment failed."
}

# ============================================

# 6. Local cleanup

# ============================================

Write-Host "[6/7] Cleaning local files..." -ForegroundColor Yellow

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
