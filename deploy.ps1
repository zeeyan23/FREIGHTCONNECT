
# ============================================
# FreightConnect - Laravel Deployment Script
# ============================================

$ErrorActionPreference = "Stop"

# Prevent native stderr output from terminating PowerShell 7 commands.
$PSNativeCommandUseErrorActionPreference = $false

# ---------- LOCAL ----------

$ProjectPath = "D:\globaltrading"
$DeployTemp = "$ProjectPath\deploy_temp"
$ZipFile = "$ProjectPath\freightconnect_deploy.zip"
$RemoteScriptFile = "$ProjectPath\remote-deploy.sh"
$LogFile = "$ProjectPath\remote-deploy.log"

# ---------- SERVER ----------

$ServerUser = "u948060652"
$ServerHost = "82.112.229.222"
$ServerPort = "65002"

$ServerProject = "/home/u948060652/freightconnect"
$ServerPublic = "/home/u948060652/domains/freightconnect.info/public_html"

$KeyFile = "$ProjectPath\freightconnect.ppk"

# ---------- PUTTY ----------

$Pscp = "C:\Program Files\PuTTY\pscp.exe"
$Plink = "C:\Program Files\PuTTY\plink.exe"

# ============================================
# 1. VALIDATION
# ============================================

Write-Host "`n[1/7] Validating deployment files..." -ForegroundColor Cyan

$RequiredMigration = Join-Path $ProjectPath "database\migrations\2026_10_20_094416_create_trader_member_account_table.php"

$ObsoleteMigrations = @(
    "2026_09_05_101439_add_trader_fields_to_trader_member_account_table.php",
    "2026_09_05_102713_update_phone_fields_in_trader_member_account_table.php"
)

if (!(Test-Path $RequiredMigration)) {
    throw "Required consolidated trader migration is missing."
}

foreach ($Migration in $ObsoleteMigrations) {
    $MigrationPath = Join-Path $ProjectPath "database\migrations\$Migration"

    if (Test-Path $MigrationPath) {
        throw "Obsolete migration found: $Migration"
    }
}

if (!(Test-Path $KeyFile)) {
    throw "SSH private key not found: $KeyFile"
}

if (!(Test-Path $Pscp)) {
    throw "PSCP not found: $Pscp"
}

if (!(Test-Path $Plink)) {
    throw "PLINK not found: $Plink"
}

# ============================================
# 2. PREPARE DEPLOYMENT PACKAGE
# ============================================

Write-Host "`n[2/7] Preparing deployment package..." -ForegroundColor Cyan

if (Test-Path $DeployTemp) {
    Remove-Item $DeployTemp -Recurse -Force
}

New-Item -ItemType Directory -Path $DeployTemp | Out-Null

# ============================================
# 3. COPY AND ZIP PROJECT
# ============================================

Write-Host "`n[3/7] Copying project files..." -ForegroundColor Cyan

$ExcludeDirectories = @(
    "$ProjectPath\.git",
    "$ProjectPath\node_modules",
    "$ProjectPath\vendor",
    "$ProjectPath\storage",
    "$ProjectPath\deploy_temp"
)

$ExcludeFiles = @(
    "$ProjectPath\.env",
    "$ProjectPath\freightconnect_deploy.zip",
    "$ProjectPath\deploy.ps1",
    "$ProjectPath\freightconnect.ppk",
    "$ProjectPath\remote-deploy.sh",
    "$ProjectPath\remote-deploy.log",
    "$ProjectPath\New Text Document.txt",
    "$ProjectPath\bootstrap\cache\config.php"
)

robocopy $ProjectPath $DeployTemp /E /XD $ExcludeDirectories /XF $ExcludeFiles /R:2 /W:2

$RoboCode = $LASTEXITCODE

if ($RoboCode -ge 8) {
    throw "Robocopy failed with exit code $RoboCode"
}


# ---------- CREATE ZIP WITH LINUX-COMPATIBLE PATHS ----------

Write-Host "`nCreating Linux-compatible deployment ZIP..." -ForegroundColor Cyan

if (Test-Path $ZipFile) {
    Remove-Item $ZipFile -Force
}

Add-Type -AssemblyName System.IO.Compression
Add-Type -AssemblyName System.IO.Compression.FileSystem

$Archive = [System.IO.Compression.ZipFile]::Open(
    $ZipFile,
    [System.IO.Compression.ZipArchiveMode]::Create
)

try {
    $Files = Get-ChildItem -Path $DeployTemp -File -Recurse

    foreach ($File in $Files) {

        $RelativePath = $File.FullName.Substring(
            $DeployTemp.TrimEnd('\').Length + 1
        )

        # Linux-compatible ZIP paths
        $EntryName = $RelativePath.Replace('\', '/')

        [System.IO.Compression.ZipFileExtensions]::CreateEntryFromFile(
            $Archive,
            $File.FullName,
            $EntryName,
            [System.IO.Compression.CompressionLevel]::Optimal
        ) | Out-Null
    }

    Write-Host "Files added: $($Files.Count)" -ForegroundColor Green
}
finally {
    $Archive.Dispose()
}

if (!(Test-Path $ZipFile)) {
    throw "Deployment ZIP was not created."
}

# Validate ZIP root and path separators
$Archive = [System.IO.Compression.ZipFile]::OpenRead($ZipFile)

try {
    $HasArtisan = $Archive.Entries | Where-Object {
        $_.FullName -eq "artisan"
    }

    if (!$HasArtisan) {
        throw "Invalid ZIP structure: artisan file not found at ZIP root."
    }

    $InvalidEntries = $Archive.Entries | Where-Object {
        $_.FullName.Contains('\')
    }

    if ($InvalidEntries) {
        throw "ZIP contains Windows-style backslash paths."
    }
}
finally {
    $Archive.Dispose()
}

Write-Host "Linux-compatible deployment ZIP created successfully." -ForegroundColor Green


# ============================================
# 4. UPLOAD ZIP
# ============================================

Write-Host "`n[4/7] Uploading deployment ZIP..." -ForegroundColor Cyan

& $Pscp -batch -P $ServerPort -i $KeyFile $ZipFile "${ServerUser}@${ServerHost}:${ServerProject}/freightconnect_deploy.zip"

if ($LASTEXITCODE -ne 0) {
    throw "ZIP upload failed."
}

# ============================================
# 5. CREATE REMOTE BASH SCRIPT
# ============================================

Write-Host "`n[5/7] Preparing remote deployment script..." -ForegroundColor Cyan

$RemoteScript = @"
#!/bin/bash
set -e

cd "$ServerProject"

echo "============================================"
echo "FreightConnect deployment started"
echo "============================================"

echo "Extracting deployment package..."

unzip -oq freightconnect_deploy.zip

rm -f freightconnect_deploy.zip

echo "Setting project permissions..."

for dir in app bootstrap config database public resources routes tests
do
    if [ -d "`$dir" ]; then
        find "`$dir" -type d -exec chmod 755 {} +
        find "`$dir" -type f -exec chmod 644 {} +
    fi
done

chmod 755 artisan

echo "Preparing Laravel cache directory..."

mkdir -p bootstrap/cache

chmod 755 bootstrap/cache

rm -f bootstrap/cache/config.php
rm -f bootstrap/cache/packages.php
rm -f bootstrap/cache/services.php

echo "Installing production Composer dependencies..."

composer install --no-dev --no-scripts --optimize-autoloader --no-interaction

echo "Running Laravel package discovery..."

 /usr/bin/php artisan package:discover --ansi

echo "Clearing Laravel caches..."

 /usr/bin/php artisan optimize:clear

echo "Running database migrations..."

 /usr/bin/php artisan migrate --force

echo "Creating production configuration cache..."

 /usr/bin/php artisan config:cache

echo "Syncing public assets..."

PUBLIC_PATH="$ServerPublic"

mkdir -p "`$PUBLIC_PATH"

for item in build css images videos
do
    if [ -d "public/`$item" ]; then
        mkdir -p "`$PUBLIC_PATH/`$item"
        cp -a "public/`$item/." "`$PUBLIC_PATH/`$item/"
    fi
done

for item in .htaccess favicon.ico robots.txt
do
    if [ -f "public/`$item" ]; then
        cp -f "public/`$item" "`$PUBLIC_PATH/`$item"
    fi
done

echo "============================================"
echo "Deployment completed successfully."
echo "============================================"

echo "Database migrations were executed automatically."
"@

# IMPORTANT:
# Convert Windows CRLF line endings to Unix LF.
$RemoteScriptUnix = $RemoteScript -replace "`r`n", "`n"

[System.IO.File]::WriteAllText(
    $RemoteScriptFile,
    $RemoteScriptUnix,
    [System.Text.Encoding]::ASCII
)

# ============================================
# UPLOAD REMOTE BASH SCRIPT
# ============================================

Write-Host "`nUploading remote Bash script..." -ForegroundColor Cyan

& $Pscp -batch -P $ServerPort -i $KeyFile $RemoteScriptFile "${ServerUser}@${ServerHost}:${ServerProject}/remote-deploy.sh"

if ($LASTEXITCODE -ne 0) {
    throw "Remote Bash script upload failed."
}

# ============================================
# EXECUTE REMOTE DEPLOYMENT
# ============================================

Write-Host "`nExecuting remote deployment..." -ForegroundColor Cyan

if (Test-Path $LogFile) {
    Remove-Item $LogFile -Force
}

$PreviousErrorActionPreference = $ErrorActionPreference

try {
    # Allow Plink stderr messages to be captured without stopping PowerShell.
    $ErrorActionPreference = "Continue"

    $RemoteOutput = & $Plink -batch -P $ServerPort -i $KeyFile "${ServerUser}@${ServerHost}" "bash $ServerProject/remote-deploy.sh" 2>&1

    $RemoteExitCode = $LASTEXITCODE
}
finally {
    $ErrorActionPreference = $PreviousErrorActionPreference
}

$RemoteOutput | Tee-Object -FilePath $LogFile

if ($RemoteExitCode -ne 0) {
    Write-Host "`nRemote deployment failed. Exit code: $RemoteExitCode" -ForegroundColor Red
    Write-Host "Check remote-deploy.log for the complete error." -ForegroundColor Yellow
    throw "Remote deployment failed."
}

Write-Host "`nRemote deployment successful." -ForegroundColor Green

& $Plink -batch -P $ServerPort -i $KeyFile "${ServerUser}@${ServerHost}" "rm -f $ServerProject/remote-deploy.sh"

if ($LASTEXITCODE -ne 0) {
    Write-Warning "Deployment succeeded, but temporary remote script could not be removed."
}

# ============================================
# 6. LOCAL CLEANUP
# ============================================

Write-Host "`n[6/7] Cleaning local temporary files..." -ForegroundColor Cyan

if (Test-Path $DeployTemp) {
    Remove-Item $DeployTemp -Recurse -Force
}

# Keep deployment ZIP for inspection.
# Remove-Item $ZipFile -Force

# ============================================
# 7. COMPLETE
# ============================================

Write-Host "`n[7/7] Deployment completed successfully!" -ForegroundColor Green

Write-Host "Website: https://freightconnect.info" -ForegroundColor Green
Write-Host "Sitemap: https://freightconnect.info/sitemap.xml" -ForegroundColor Green

Write-Host "`nDeployment log: $LogFile" -ForegroundColor Cyan
