# deploy_hostinger.ps1
# PowerShell Script - Opsi A (Single Codebase)

# ================= CONFIGURATION =================
$SSH_IP       = "153.92.9.128"
$SSH_USER     = "u603012205"
$SSH_PORT     = "65002"
$LARAVEL_PATH = "~/laravel"
$PUBLIC_PATH  = "~/domains/homeputrainterior.com/public_html"
# =================================================

Write-Output ""
Write-Output "=========================================="
Write-Output "  DEPLOYING TO HOSTINGER (Opsi A)"
Write-Output "=========================================="
Write-Output ""

# 1. Build Frontend
Write-Output "[1/5] Building Frontend Assets..."
cmd /c npm run build
if ($LASTEXITCODE -ne 0) { Write-Error "Build failed!"; exit }

# 2. Create ZIP (excluding unnecessary files)
Write-Output "[2/5] Creating deployment package..."
if (Test-Path "deploy_package.zip") { Remove-Item "deploy_package.zip" -Force }

$exclude = @("node_modules", ".git", "deploy_package.zip", "tests", ".vscode")
Write-Output "      Compressing files..."
Get-ChildItem -Path . -Exclude $exclude -Force | Compress-Archive -DestinationPath "deploy_package.zip" -Force

# 3. Upload via SCP
Write-Output "[3/5] Uploading to Hostinger..."
Write-Output "      Password: Putra031#"
scp -o StrictHostKeyChecking=no -P $SSH_PORT "deploy_package.zip" "$SSH_USER@$SSH_IP`:~/"

if ($LASTEXITCODE -ne 0) { Write-Error "Upload failed!"; exit }

# 4. Remote Setup via SSH
Write-Output "[4/5] Remote Setup..."

$setupCmds = @"
# Create laravel folder
mkdir -p $LARAVEL_PATH

# Extract files
cd ~ && unzip -o deploy_package.zip -d $LARAVEL_PATH && rm deploy_package.zip

# Setup .env
cd $LARAVEL_PATH
if [ ! -f .env ]; then cp .env.production .env; fi

# Copy public files to public_html
rm -rf $PUBLIC_PATH/*
cp -r $LARAVEL_PATH/public/* $PUBLIC_PATH/
cp $LARAVEL_PATH/public/.htaccess $PUBLIC_PATH/.htaccess

# Set permissions
chmod -R 755 $LARAVEL_PATH/storage
chmod -R 755 $LARAVEL_PATH/bootstrap/cache

# Create storage symlink
rm -f $PUBLIC_PATH/storage
ln -sf $LARAVEL_PATH/storage/app/public $PUBLIC_PATH/storage

# Run Laravel commands
cd $LARAVEL_PATH
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo 'SUCCESS!'
"@

# Join commands into single line for SSH
$singleLineCmds = ($setupCmds -split "`n" | Where-Object { $_ -notmatch '^\s*#' -and $_.Trim() -ne '' }) -join ' && '

ssh -o StrictHostKeyChecking=no -p $SSH_PORT "$SSH_USER@$SSH_IP" $singleLineCmds

# 5. Done
Write-Output ""
Write-Output "[5/5] DEPLOYMENT COMPLETE!"
Write-Output ""
Write-Output "=========================================="
Write-Output "  Website: https://homeputrainterior.com"
Write-Output "  Admin:   https://admin.homeputrainterior.com/login"
Write-Output "=========================================="
Write-Output ""
Read-Host "Press Enter to exit..."
