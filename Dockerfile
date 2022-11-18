FROM php:8.1-fpm

ARG UID
ARG GID

RUN test -n "$UID" || (echo "ERROR: UID is not set" && false)
RUN test -n "$GID" || (echo "ERROR: GID is not set" && false)

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $UID -d /home/laravel laravel
RUN groupmod -g $GID laravel

RUN mkdir -p /home/laravel/.composer && \
    chown -R laravel:laravel /home/laravel

# Set working directory
WORKDIR /var/www

USER laravel