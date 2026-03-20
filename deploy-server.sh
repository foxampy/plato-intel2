#!/bin/bash
# Plato Intel - Server Deploy Script
# Usage: ./deploy.sh

set -e

echo "====================================="
echo "  PLATO INTEL - Server Deploy"
echo "====================================="
echo ""

# Configuration
APP_PATH="/home/platoint/www/plato-intel.by"
PHP_VERSION="8.1"

cd $APP_PATH

echo "[1/6] Pulling latest changes..."
git pull origin main

echo ""
echo "[2/6] Installing PHP dependencies..."
composer install --no-dev -o --no-interaction

echo ""
echo "[3/6] Installing NPM dependencies..."
pnpm install --production

echo ""
echo "[4/6] Building assets..."
pnpm run build

echo ""
echo "[5/6] Running migrations..."
php artisan migrate --force

echo ""
echo "[6/6] Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo ""
echo "====================================="
echo "  Deploy Complete!"
echo "====================================="
echo ""
echo "Site URL: https://plato-intel.by"
echo ""
