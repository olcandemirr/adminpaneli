# Laravel için resmi PHP 8.1 görüntüsünü kullan
FROM php:8.1-fpm

# Gerekli bağımlılıkları yükle
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Çalışma dizinini belirle
WORKDIR /var/www

# Laravel projesini yükle
COPY . .

# Composer bağımlılıklarını yükle
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Artisan işlemlerini çalıştır
RUN php artisan migrate --force

# Laravel’i başlat
CMD php artisan serve --host=0.0.0.0 --port=8000
