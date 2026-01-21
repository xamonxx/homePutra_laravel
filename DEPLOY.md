# 🚀 DEPLOY KE HOSTINGER

## Langkah Deploy

### 1. Build Lokal
```powershell
cd c:\laragon\www\homeputra-laravel
npm run build
```

### 2. Upload via SSH
```bash
# Login SSH
ssh -p 65002 u603012205@153.92.9.128
# Password: Putra031#

# Bersihkan dan clone
cd ~/domains/homeputrainterior.com/public_html
rm -rf * .*
git clone https://github.com/xamonxx/homePutra_laravel.git .

# Install dependencies
composer install --no-dev --optimize-autoloader

# Setup permissions
chmod -R 775 storage bootstrap/cache
```

### 3. Setup .env
```bash
# Buat .env dengan konfigurasi production
# (sudah ada di repo, tinggal pastikan database benar)
```

### 4. Copy Assets ke Root
```bash
# PENTING: Copy assets dan build ke root agar bisa diakses
cp -r public/assets .
cp -r public/build .
```

### 5. Cache Config
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 6. Setup Subdomain Admin
Di hPanel Hostinger:
- Buat subdomain `admin`
- Document Root: `domains/homeputrainterior.com/public_html/public`

## Test
- Frontend: https://homeputrainterior.com
- Admin: https://admin.homeputrainterior.com/login
  - Username: admin
  - Password: admin123
