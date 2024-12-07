FROM php:8.3-fpm
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-install intl \
    && docker-php-ext-enable intl \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql
# Очистите ненужные файлы
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Убедитесь, что Composer установлен
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Копируем приложение внутрь контейнера
WORKDIR /var/www/html