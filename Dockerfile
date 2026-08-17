FROM php:8.3-cli

WORKDIR /var/www/html

ENV COMPOSER_PROCESS_TIMEOUT=900

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

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN if [ -f vendor/autoload.php ]; then \
        echo "Vendor ditemukan, skip composer install"; \
    else \
        composer install \
            --no-interaction \
            --prefer-dist \
            --no-dev \
            --optimize-autoloader; \
    fi

RUN mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data \
        storage \
        bootstrap/cache

EXPOSE 8080

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]
