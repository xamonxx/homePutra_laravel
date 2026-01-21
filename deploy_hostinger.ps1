# deploy_hostinger.ps1
# Script PowerShell untuk Auto-Deploy Laravel ke Hostinger

# ================= K O N F I G U R A S I =================
# ISI DATA INI SESUAI SSH HOSTINGER ANDA
$SSH_IP       = "185.xxx.xxx.xxx"      # Ganti dengan IP SSH Hostinger
$SSH_USER     = "u603012205"           # Ganti dengan Username SSH
$SSH_PORT     = "65002"                # Port default Hostinger
$REMOTE_PATH  = "~/public_html"        # Folder tujuan (biasanya ~/public_html atau ~/domains/domain.com/public_html)
# =========================================================

Write-Host "🚀 MEMULAI DEPLOYMENT KE HOSTINGER..." -ForegroundColor Cyan

# 1. Build Frontend
Write-Host "`n📦 1. Building Assets (NPM)..." -ForegroundColor Yellow
cmd /c npm run build
if ($LASTEXITCODE -ne 0) { Write-Error "Build gagal!"; exit }

# 2. Prepare Zip
Write-Host "`n🗜️  2. Membuat Arsip Deploy (deploy_package.zip)..." -ForegroundColor Yellow
$exclude = @(
    "node_modules",
    ".git",
    "storage/*.key",
    "deploy_package.zip",
    "database_export.sql",
    "tests"
)

# Hapus zip lama jika ada
if (Test-Path "deploy_package.zip") { Remove-Item "deploy_package.zip" }

# Zip file (Membutuhkan 7-Zip atau Compress-Archive bawaan)
# Kita pakai Compress-Archive bawaan Powershell (agak lambat tapi pasti ada)
# Untuk lebih cepat, exclude folder manual
Write-Host "   Mohon tunggu, sedang mengompres file..."
Get-ChildItem -Path . -Exclude $exclude | Compress-Archive -DestinationPath "deploy_package.zip" -Force

# 3. Upload via SCP
Write-Host "`n☁️  3. Mengupload ke Hostinger ($SSH_IP)..." -ForegroundColor Yellow
Write-Host "   Anda mungkin diminta memasukkan password SSH..."
scp -P $SSH_PORT "deploy_package.zip" "$SSH_USER@$SSH_IP`:$REMOTE_PATH/"

if ($LASTEXITCODE -ne 0) { Write-Error "Upload gagal! Cek IP/User/Password."; exit }

# 4. Extract & Setup via SSH
Write-Host "`n🔧 4. Eksekusi Perintah Remote (Unzip & Setup)..." -ForegroundColor Yellow
$commands = "
    cd $REMOTE_PATH && \
    echo '📂 Extracting...' && \
    unzip -o deploy_package.zip && \
    rm deploy_package.zip && \
    echo '📦 Installing/Updating Composer...' && \
    composer install --optimize-autoloader --no-dev && \
    echo '🔗 Linking Storage...' && \
    php artisan storage:link && \
    echo '🧹 Clearing Cache...' && \
    php artisan optimize:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    echo '✅ SUCCESS! Website berhasil di-update.'
"

ssh -p $SSH_PORT "$SSH_USER@$SSH_IP" $commands

Write-Host "`n🎉 DEPLOYMENT SELESAI!" -ForegroundColor Green
Read-Host "Tekan Enter untuk keluar..."
