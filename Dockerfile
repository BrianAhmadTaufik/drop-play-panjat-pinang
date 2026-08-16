FROM php:8.3-cli

WORKDIR /var/www/html

ENV COMPOSER_PROCESS_TIMEOUT=900

# =========================================================
# System dependencies + PostgreSQL extension
# =========================================================

RUN apt-get update \
    && apt-get install -y \
        git \
        unzip \
        libpq-dev \
        libzip-dev \
        zip \
    && docker-php-ext-install \
        pdo_pgsql \
        pgsql \
        zip \
    && rm -rf /var/lib/apt/lists/*

# =========================================================
# Composer
# =========================================================

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# =========================================================
# Laravel project
# =========================================================

COPY . .

# =========================================================
# Install PHP dependencies
# =========================================================

RUN composer install \
        --no-interaction \
        --prefer-dist \
        --no-dev \
        --optimize-autoloader

# =========================================================
# Laravel writable directories
# =========================================================

RUN mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data \
        storage \
        bootstrap/cache

# =========================================================
# Port
# =========================================================

EXPOSE 8080

# Railway injects $PORT at runtime
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]