FROM php:8.3-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV COMPOSER_PROCESS_TIMEOUT=900

WORKDIR /var/www/html

# =========================================================
# PHP extensions + system packages
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
# Laravel application
# =========================================================

COPY . .

# =========================================================
# PHP dependencies
# =========================================================

RUN composer install \
        --no-interaction \
        --prefer-dist \
        --no-dev \
        --optimize-autoloader

# =========================================================
# Laravel directories
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
# Apache -> Laravel /public
# =========================================================

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# =========================================================
# Laravel Apache rewrite
# =========================================================

RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]