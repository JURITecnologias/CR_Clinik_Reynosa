FROM php:8.4.27-apache-trixie@sha256:884f64b47174de2c0e813270fe7b24a18605729fcebe201302d98c38805530d0

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y --no-install-recommends \
        curl git unzip libcurl4-openssl-dev libfreetype6-dev \
        libicu-dev libjpeg62-turbo-dev libonig-dev libpng-dev \
        libxml2-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        bcmath exif gd intl mysqli pdo_mysql zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY deploy/php-security.ini /usr/local/etc/php/conf.d/99-security.ini
COPY deploy/apache.conf /etc/apache2/sites-available/000-default.conf
COPY deploy/entrypoint.sh /usr/local/bin/clinik-entrypoint
COPY front/ /var/www/html/front/
COPY backend/api-consulmdregister/ /var/www/html/backend/api-consulmdregister/

RUN chmod +x /usr/local/bin/clinik-entrypoint \
    && mkdir -p /var/www/html/backend/api-consulmdregister/storage/app/public \
        /var/www/html/backend/api-consulmdregister/storage/framework/cache/data \
        /var/www/html/backend/api-consulmdregister/storage/framework/sessions \
        /var/www/html/backend/api-consulmdregister/storage/framework/views \
        /var/www/html/backend/api-consulmdregister/storage/logs \
        /var/www/html/backend/api-consulmdregister/bootstrap/cache \
    && cd /var/www/html/front \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-progress \
    && cd /var/www/html/backend/api-consulmdregister \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-progress \
    && chown -R www-data:www-data storage bootstrap/cache

WORKDIR /var/www/html/backend/api-consulmdregister

HEALTHCHECK --interval=30s --timeout=5s --start-period=30s \
    CMD curl -fsS http://127.0.0.1/login.php > /dev/null \
        && curl -fsS http://127.0.0.1/bkend/public/ > /dev/null || exit 1

ENTRYPOINT ["clinik-entrypoint"]
CMD ["apache2-foreground"]
