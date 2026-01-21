#!/bin/bash

# =========================================
# HOSTINGER DEPLOY SCRIPT - Opsi A (Single Codebase)
# =========================================
# Jalankan script ini setelah upload file ke Hostinger
# via SSH Terminal
# =========================================

echo "🚀 Deploying Laravel to Hostinger..."

# Konfigurasi path
LARAVEL_PATH="$HOME/laravel"
PUBLIC_PATH="$HOME/domains/homeputrainterior.com/public_html"

# 1. Backup public_html lama (jika ada)
if [ -d "$PUBLIC_PATH.backup" ]; then
    rm -rf "$PUBLIC_PATH.backup"
fi
if [ -d "$PUBLIC_PATH" ] && [ "$(ls -A $PUBLIC_PATH)" ]; then
    echo "📦 Backing up old public_html..."
    mv "$PUBLIC_PATH" "$PUBLIC_PATH.backup"
    mkdir -p "$PUBLIC_PATH"
fi

# 2. Extract files
echo "📂 Extracting files..."
cd "$HOME"
if [ -f "deploy_package.zip" ]; then
    unzip -o deploy_package.zip -d "$LARAVEL_PATH"
    rm deploy_package.zip
fi

# 3. Copy public folder contents to public_html
echo "🔗 Setting up public_html..."
cp -r "$LARAVEL_PATH/public/"* "$PUBLIC_PATH/"
cp "$LARAVEL_PATH/public/.htaccess" "$PUBLIC_PATH/.htaccess" 2>/dev/null || true

# 4. Setup .env
cd "$LARAVEL_PATH"
if [ ! -f ".env" ]; then
    echo "⚙️ Setting up .env from .env.production..."
    cp .env.production .env
fi

# 5. Set permissions
echo "🔒 Setting permissions..."
chmod -R 755 "$LARAVEL_PATH/storage"
chmod -R 755 "$LARAVEL_PATH/bootstrap/cache"
chmod -R 755 "$PUBLIC_PATH"

# 6. Create storage symlink
echo "🔗 Creating storage symlink..."
rm -f "$PUBLIC_PATH/storage"
ln -s "$LARAVEL_PATH/storage/app/public" "$PUBLIC_PATH/storage"

# 7. Run artisan commands
echo "⚡ Running Laravel optimizations..."
cd "$LARAVEL_PATH"
php artisan storage:link 2>/dev/null || true
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "✅ DEPLOYMENT COMPLETE!"
echo ""
echo "📋 Akses Website:"
echo "   🌐 Frontend: https://homeputrainterior.com"
echo "   🔐 Admin:    https://admin.homeputrainterior.com/login"
echo ""
echo "🔑 Default Admin Login:"
echo "   Username: admin"
echo "   Password: admin123"
echo ""
