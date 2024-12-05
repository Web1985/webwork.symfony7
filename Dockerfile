FROM php:8.3-fpm

# Устанавливаем необходимые пакеты и расширения PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql

# Убедитесь, что Composer установлен
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Копируем приложение внутрь контейнера
WORKDIR /var/www/html