# 🚀 PANDUAN DEPLOY LARAVEL KE HOSTINGER
## Dengan Subdomain Admin Terpisah

---

## 📋 Konfigurasi Domain

| Domain | Fungsi |
|--------|--------|
| `homeputrainterior.com` | Landing Page (Frontend) |
| `admin.homeputrainterior.com` | Admin Panel (CMS) |

---

## 📦 LANGKAH 1: Setup Subdomain di Hostinger

### A. Buat Subdomain Admin
1. Login ke **hPanel Hostinger**
2. Pergi ke **Domains** → **Subdomains**
3. Tambah subdomain baru:
   - Subdomain: `admin`
   - Folder: `public_html` (PENTING: sama dengan domain utama!)
4. Tunggu propagasi DNS (5-30 menit)

### B. Verifikasi SSL untuk Subdomain
1. Pergi ke **Security** → **SSL**
2. Pastikan SSL aktif untuk:
   - `homeputrainterior.com`
   - `admin.homeputrainterior.com`

---

## 📤 LANGKAH 2: Upload File ke Hostinger

### Struktur Folder di Hostinger:
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .htaccess
├── .env (copy dari .env.production)
├── artisan
├── composer.json
└── composer.lock
```

**PENTING:** Semua file Laravel ada di `public_html`, bukan di folder terpisah!

---

## 🗃️ LANGKAH 3: Buat Database di Hostinger

1. **hPanel** → **Databases** → **MySQL Databases**
2. Buat database baru
3. **CATAT** kredensial:
   - Database name: `u123456789_homeputra`
   - Username: `u123456789_admin`
   - Password: `xxxx`

---

## ⚙️ LANGKAH 4: Konfigurasi .env

1. Rename `.env.production` menjadi `.env`
2. Edit file `.env`:

```env
APP_URL=https://homeputrainterior.com
APP_DOMAIN=homeputrainterior.com

# AKTIFKAN SUBDOMAIN ADMIN
ADMIN_SUBDOMAIN=true
ADMIN_DOMAIN=admin.homeputrainterior.com

# SESSION DOMAIN (PENTING untuk cross-subdomain)
SESSION_DOMAIN=.homeputrainterior.com

# DATABASE
DB_DATABASE=u123456789_homeputra
DB_USERNAME=u123456789_admin
DB_PASSWORD=password_anda
```

**⚠️ PENTING:** `SESSION_DOMAIN` harus dimulai dengan titik (`.`) agar cookie bisa diakses di subdomain!

---

## 🔧 LANGKAH 5: Konfigurasi .htaccess

File `.htaccess` di root `public_html` sudah dikonfigurasi untuk:
- Redirect ke HTTPS
- Handle subdomain dan path
- Security headers
- Caching

Tidak perlu diubah jika menggunakan konfigurasi default.

---

## 🗄️ LANGKAH 6: Import Database

### Via phpMyAdmin:
1. Buka **phpMyAdmin** di hPanel
2. Pilih database yang sudah dibuat
3. Tab **Import** → Upload `database_export.sql`
4. Klik **Go**

---

## 🔗 LANGKAH 7: Setup Storage & Permissions

Via SSH Terminal:
```bash
cd ~/public_html

# Buat storage symlink
php artisan storage:link

# Set permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

---

## ✅ LANGKAH 8: Optimasi Production

```bash
cd ~/public_html

# Clear semua cache
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generate cache baru
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🧪 LANGKAH 9: Testing

### Landing Page:
- ✅ `https://homeputrainterior.com` - Homepage
- ✅ `https://homeputrainterior.com/calculator` - Kalkulator
- ✅ `https://homeputrainterior.com/sitemap.xml` - Sitemap

### Admin Panel:
- ✅ `https://admin.homeputrainterior.com/login` - Login
- ✅ `https://admin.homeputrainterior.com/dashboard` - Dashboard

---

## 🐛 Troubleshooting

### Subdomain tidak bisa diakses?
1. Tunggu propagasi DNS (5-30 menit)
2. Cek apakah subdomain sudah dibuat di hPanel
3. Pastikan folder subdomain = `public_html`

### Session tidak terbagi antar subdomain?
```env
# Pastikan di .env:
SESSION_DOMAIN=.homeputrainterior.com
```
(Dengan titik di depan!)

### Admin redirect ke landing page?
Pastikan `ADMIN_SUBDOMAIN=true` di `.env`

### Error 500 di admin?
```bash
# Check log
cat ~/public_html/storage/logs/laravel.log
```

---

## 🔄 Cara Beralih Mode

### Mode Subdomain (Production):
```env
ADMIN_SUBDOMAIN=true
ADMIN_DOMAIN=admin.homeputrainterior.com
```
Akses: `admin.homeputrainterior.com/login`

### Mode Path (Development):
```env
ADMIN_SUBDOMAIN=false
```
Akses: `homeputrainterior.com/admin/login`

---

## 📊 Submit ke Google Search Console

1. Buka https://search.google.com/search-console
2. Add kedua domain:
   - `https://homeputrainterior.com`
   - `https://admin.homeputrainterior.com` (opsional, biasanya di-noindex)
3. Submit sitemap: `https://homeputrainterior.com/sitemap.xml`

---

## 🎉 SELESAI!

### Checklist Final:
- [ ] Landing page bisa diakses: `homeputrainterior.com`
- [ ] Admin panel bisa diakses: `admin.homeputrainterior.com`
- [ ] Login admin berfungsi
- [ ] Session tetap aktif saat navigasi
- [ ] SSL aktif di kedua domain
- [ ] Kalkulator berfungsi
- [ ] Sitemap bisa diakses
