# 🚀 DEPLOYMENT VIA SSH (HOSTINGER)

Metode ini lebih cepat dan profesional daripada upload manual via File Manager.

---

## 📋 DATA YANG DIBUTUHKAN
Dapatkan data ini dari hPanel Hostinger (Menu **Advanced** -> **SSH Access**):

1. **IP Address**: (contoh: `185.123.456.78`)
2. **Username**: (contoh: `u603012205`)
3. **Password**: (Password akun Hostinger/FTP Anda)
4. **Port**: (biasanya `65002`)

---

## 🛠️ OPSI 1: DEPLOY OTOMATIS DARI WINDOWS (Tercepat)

Saya telah menyiapkan script PowerShell untuk mengotomatisasi proses ini. 

### 1. Edit Konfigurasi
Buka file `deploy_hostinger.ps1` (saya akan buatkan setelah ini) dan isi data SSH Anda.

### 2. Jalankan Script
Dari terminal Visual Studio Code / PowerShell:
```powershell
.\deploy_hostinger.ps1
```

Script ini akan:
1. Membuild aset frontend (npm run build)
2. Membuat file ZIP project (tanpa folder sampah seperti node_modules)
3. Mengupload ZIP ke Hostinger via SCP
4. Mengekstrak file di server otomatis
5. Menjalankan perintah setup (migrate, cache, storage link)

---

## 💻 OPSI 2: MANUAL VIA TERMINAL SSH

Jika Anda ingin menjalankan perintah manual satu per satu.

### 1. Login ke SSH
Buka terminal (CMD/PowerShell) dan ketik:
```bash
# Format: ssh -P [PORT] [USERNAME]@[IP]
ssh -P 65002 u603012205@185.xxx.xxx.xxx
```
*Masukkan password saat diminta.*

### 2. Masuk ke Folder Public HTML
```bash
cd domains/homeputrainterior.com/public_html
# ATAU jika pakai domain utama:
cd public_html
```

### 3. Upload & Extract (via Terminal Lokal)
Jika belum upload file, lakukan upload ZIP dari komputer lokal, lalu di SSH Hostinger:
```bash
unzip -o project.zip
rm project.zip
```

### 4. Setup Laravel
Jalankan perintah ini di terminal SSH Hostinger:

```bash
# 1. Install Dependency PHP
composer install --optimize-autoloader --no-dev

# 2. Copy Environment File (jika belum ada)
cp .env.production .env
# (Lalu edit .env dengan: nano .env)

# 3. Generate Key
php artisan key:generate

# 4. Storage Link
php artisan storage:link

# 5. Migrasi Database
php artisan migrate --force

# 6. Optimasi Cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## ⚠️ PENTING: STRUKTUR FOLDER

Untuk kemudahan (bypass error 403), kita menggunakan struktur **Single Folder**:
- Semua file Laravel ada DI DALAM `public_html`.
- File `.htaccess` melindungi file sensitif (.env).
- File `index.php` di root mengarahkan ke `public/index.php`.

Pastikan Anda tidak membuat folder `laravel` terpisah kecuali Anda paham konfigurasi advanced path.
