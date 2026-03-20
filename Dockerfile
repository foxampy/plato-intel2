FROM php:8.3-apache

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Установка расширений PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Включение mod_rewrite для Laravel
RUN a2enmod rewrite

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копирование файлов проекта
COPY . /var/www/html
WORKDIR /var/www/html

# Установка PHP зависимостей
RUN composer update --no-dev --optimize-autoloader --ignore-platform-reqs

# Установка Node.js зависимостей
RUN npm install -g pnpm
RUN pnpm install --production
RUN pnpm run build

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Настройка Apache
COPY .docker/apache2.conf /etc/apache2/apache2.conf
COPY .docker/000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
