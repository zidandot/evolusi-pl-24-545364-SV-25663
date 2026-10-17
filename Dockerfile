FROM php:8.2.27-cli AS builder

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo pdo_sqlite pdo_mysql mbstring

COPY --from=composer:2.8.5 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction

COPY . .

RUN composer dump-autoload --optimize --no-dev

FROM php:8.2.27-alpine

RUN apk add --no-cache \
    sqlite-dev \
    libpng-dev \
    oniguruma-dev \
    curl \
    && docker-php-ext-install pdo pdo_sqlite pdo_mysql mbstring

WORKDIR /app

COPY --from=builder /app /app

RUN cp .env.example .env \
    && touch database/database.sqlite \
    && php artisan key:generate \
    && php artisan migrate --force

RUN chown -R www-data:www-data /app
USER www-data

EXPOSE 8000

HEALTHCHECK --interval=10s --timeout=3s --start-period=5s --retries=3 \
  CMD curl -f http://localhost:8000/api/tugas || exit 1

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]