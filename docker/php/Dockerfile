FROM php:8.2-fpm

COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql zip

RUN if ! pecl list | grep -q xdebug; then pecl install xdebug; fi

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html