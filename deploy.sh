set -e

echo "Menjalankan deployment script..."

php artisan down || true

git pull origin main

composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan migrate --force

php artisan config:cache

php artisan route:cache

php artisan up

echo "Deployment selesai!"
