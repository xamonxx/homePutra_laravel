#!/bin/bash

# =========================================
# SCRIPT DEPLOY LARAVEL KE HOSTINGER
# =========================================
# Jalankan script ini via SSH di Hostinger
# setelah upload dan extract file

echo "🚀 Starting Laravel Deployment..."

# Set Laravel path
LARAVEL_PATH="$HOME/laravel"
PUBLIC_PATH="$HOME/public_html"

# Navigate to Laravel folder
cd $LARAVEL_PATH

# 1. Install Composer dependencies
echo "📦 Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev --no-interaction

# 2. Generate App Key (if not set)
echo "🔑 Generating app key..."
php artisan key:generate --force

# 3. Clear all caches
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# 4. Run migrations
echo "📊 Running migrations..."
php artisan migrate --force

# 5. Seed database
echo "🌱 Seeding database..."
php artisan db:seed --force

# 6. Create storage link
echo "🔗 Creating storage link..."
rm -f $PUBLIC_PATH/storage
ln -s $LARAVEL_PATH/storage/app/public $PUBLIC_PATH/storage

# 7. Set permissions
echo "🔒 Setting permissions..."
chmod -R 755 $LARAVEL_PATH/storage
chmod -R 755 $LARAVEL_PATH/bootstrap/cache

# 8. Optimize for production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo ""
echo "✅ Deployment completed!"
echo ""
echo "📋 Next steps:"
echo "   1. Update .env with your database credentials"
echo "   2. Setup subdomain admin.homeputrainterior.com"
echo "   3. Install SSL certificate"
echo "   4. Test the website"
echo ""
echo "🔑 Admin Login:"
echo "   URL: https://admin.homeputrainterior.com/login"
echo "   Username: admin"
echo "   Password: admin123"
echo ""
