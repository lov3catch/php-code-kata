FROM php:8.2

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apt update && apt install -y \
    git \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

WORKDIR /app