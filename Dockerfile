FROM php:8.3-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

WORKDIR /var/www/html


# =========================================================
# System dependencies
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
# Apache MPM
# php:<version>-apache menggunakan prefork
# =========================================================

RUN a2dismod mpm_event || true \
    && a2dismod mpm_worker || true \
    && a2dismod mpm_prefork || true \
    && rm -f \
        /etc/apache2/mods-enabled/mpm_event.load \
        /etc/apache2/mods-enabled/mpm_event.conf \
        /etc/apache2/mods-enabled/mpm_worker.load \
        /etc/apache2/mods-enabled/mpm_worker.conf \
        /etc/apache2/mods-enabled/mpm_prefork.load \
        /etc/apache2/mods-enabled/mpm_prefork.conf \
    && a2enmod mpm_prefork \
    && a2enmod rewrite


# =========================================================
# Composer
# =========================================================

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# =========================================================
# Application
# =========================================================

COPY . .


# =========================================================
# Composer install
# =========================================================

RUN composer config --global process-timeout 900 \
    && composer install \
        --no-interaction \
        --prefer-dist \
        --no-dev \
        --optimize-autoloader


# =========================================================
# Laravel permissions
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
# Apache → Laravel /public
# =========================================================

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/conf-available/docker-php.conf


EXPOSE 80


CMD ["apache2-foreground"]