FROM php:8.1-fpm-alpine AS cakephp_php

ARG ENV=dev
ARG UID=1000
ARG HOST_OS=Linux
ENV APP_ENV=$ENV
ENV HOST_OS=$HOST_OS

RUN apk add --update --no-cache --virtual .php-deps file re2c autoconf make zlib zlib-dev g++ curl linux-headers git \
    acl curl-dev libxml2-dev icu-dev libedit-dev libzip-dev dos2unix

RUN docker-php-ext-install intl pdo pdo_mysql curl opcache xml zip

#
# application
COPY .docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN dos2unix /usr/local/bin/docker-entrypoint


WORKDIR /srv/app

RUN adduser --disabled-password --gecos '' -u $UID cakephp;
RUN addgroup -g 101 nginx
RUN addgroup cakephp nginx
RUN addgroup cakephp www-data

# add composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY app .

RUN composer install --prefer-dist --no-interaction --no-dev --ignore-platform-reqs

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]
