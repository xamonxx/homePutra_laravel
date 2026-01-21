# 🚀 DEPLOY KE HOSTINGER

## Struktur di Hostinger
```
/home/u603012205/domains/homeputrainterior.com/public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── assets/
│   ├── build/
│   ├── index.php      ← Entry point
│   └── .htaccess
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
└── artisan
```

## Langkah Deploy

### 1. Build & Zip Lokal
```powershell
cd c:\laragon\www\homeputra-laravel
npm run build
```

### 2. Upload via SSH
```bash
# Login
ssh -p 65002 u603012205@153.92.9.128
# Password: Putra031#

# Bersihkan folder lama
cd ~/domains/homeputrainterior.com
rm -rf public_html/*

# Clone dari GitHub
cd public_html
git clone https://github.com/xamonxx/homePutra_laravel.git .

# Install dependencies
composer install --no-dev --optimize-autoloader

# Setup
chmod -R 775 storage bootstrap/cache
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. Setup Subdomain Admin
Di hPanel Hostinger:
- Buat subdomain `admin`
- Document Root: `domains/homeputrainterior.com/public_html/public`

### 4. Test
- Frontend: https://homeputrainterior.com
- Admin: https://admin.homeputrainterior.com/login
