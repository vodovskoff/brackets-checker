FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN if ! php -m | grep -q 'xdebug'; then \
    pecl install xdebug && docker-php-ext-enable xdebug; \
fi

COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www/html
