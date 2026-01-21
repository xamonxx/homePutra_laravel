# 🚀 PANDUAN DEPLOY OPSI A - SINGLE CODEBASE

## 📊 Struktur di Hostinger:

```
/home/u603012205/
├── domains/homeputrainterior.com/
│   └── public_html/           ← Document Root (KEDUA domain menunjuk ke sini)
│       ├── index.php          ← Laravel entry point
│       ├── .htaccess
│       ├── assets/
│       ├── build/
│       └── storage → ../../../laravel/storage/app/public
│
└── laravel/                   ← Laravel App (AMAN, di luar public)
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    ├── resources/
    ├── routes/
    ├── storage/
    ├── vendor/
    └── .env
```

---

## 📝 LANGKAH 1: Setup Subdomain di hPanel

1. Login ke **hPanel Hostinger**
2. Buka **Domains** → **Subdomains**
3. Tambah subdomain:
   - **Subdomain**: `admin`
   - **Document Root**: `domains/homeputrainterior.com/public_html` ← **SAMA dengan domain utama!**
4. Tunggu propagasi DNS (5-30 menit)
5. Pastikan SSL aktif untuk kedua domain

---

## 📤 LANGKAH 2: Upload Files

### Opsi 2a: Via SSH (Direkomendasikan)

```bash
# 1. Login SSH
ssh -p 65002 u603012205@153.92.9.128

# 2. Buat folder laravel
mkdir -p ~/laravel

# 3. Upload dari komputer lokal (jalankan di terminal lokal)
scp -P 65002 deploy_package.zip u603012205@153.92.9.128:~/

# 4. Kembali ke SSH, extract
cd ~
unzip -o deploy_package.zip -d laravel
rm deploy_package.zip

# 5. Jalankan script deploy
cd laravel
bash deploy.sh
```

### Opsi 2b: Via File Manager

1. Upload `deploy_package.zip` ke `/home/u603012205/`
2. Extract ke folder `laravel`
3. Copy isi folder `laravel/public/*` ke `domains/homeputrainterior.com/public_html/`
4. Edit `public_html/.env` (jika perlu)

---

## ⚙️ LANGKAH 3: Setup di SSH

Setelah upload, jalankan di SSH:

```bash
cd ~/laravel

# Setup .env
cp .env.production .env

# Set permissions
chmod -R 755 storage bootstrap/cache

# Create storage symlink
ln -sf ~/laravel/storage/app/public ~/domains/homeputrainterior.com/public_html/storage

# Run artisan
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🧪 LANGKAH 4: Testing

1. **Frontend**: https://homeputrainterior.com
2. **Admin**: https://admin.homeputrainterior.com/login
   - Username: `admin`
   - Password: `admin123`

---

## 🐛 Troubleshooting

### Error 403 Forbidden?
- Cek apakah file `.htaccess` ada di `public_html`
- Pastikan permission folder `755`

### Error 500?
- Cek log: `cat ~/laravel/storage/logs/laravel.log`
- Pastikan `.env` sudah ada dan benar
- Jalankan: `php artisan config:clear && php artisan config:cache`

### Admin subdomain tidak bisa diakses?
- Pastikan subdomain sudah dibuat di hPanel
- Pastikan Document Root = `domains/homeputrainterior.com/public_html`
- Tunggu propagasi DNS

### Session tidak shared antar subdomain?
- Pastikan di `.env`: `SESSION_DOMAIN=.homeputrainterior.com` (dengan titik di depan!)
