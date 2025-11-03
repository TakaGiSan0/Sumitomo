# 1. Mulai dari image PHP resmi (sesuaikan versi jika perlu)
FROM php:8.2-fpm

# 2. Set direktori kerja
WORKDIR /var/www/html

# 3. Install ekstensi PHP yang umum untuk Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# 4. Install Composer (manajer paket PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Salin file aplikasi Anda ke dalam image
COPY . .

# 6. Install dependensi proyek Anda
RUN composer install --no-dev --optimize-autoloader

# 7. Set izin folder agar Laravel bisa menulis
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Perintah ini akan dijalankan saat server 'Start'
# Render akan otomatis menyediakan variabel $PORT
CMD php artisan serve --host 0.0.0.0 --port $PORT