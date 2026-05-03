# Sử dụng PHP với Apache
FROM php:8.1-apache

# Cài đặt các extension PHP cần thiết (Đảm bảo có mysqli và pdo_mysql để gọi DB từ xa)
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Cài đặt các package bổ sung và dọn dẹp cache để giảm dung lượng image
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Cấu hình Apache cho phép truy cập
RUN echo '<Directory /var/www/html/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/docker-php.conf \
    && a2enconf docker-php

# Cấu hình Mime & DirectoryIndex
RUN echo "AddType application/x-httpd-php .php" >> /etc/apache2/mods-enabled/mime.conf \
    && echo "DirectoryIndex index.php index.html" >> /etc/apache2/mods-enabled/dir.conf

# Copy toàn bộ source code vào container
# LƯU Ý: Đảm bảo đường dẫn ./src/cuoi_ki_web/ là đúng so với vị trí Dockerfile
COPY ./src/cuoi_ki_web/ /var/www/html/

# Cấp quyền cho thư mục (Quan trọng cho bảo mật)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Cấu hình PHP tối ưu cho việc upload và xử lý
RUN { \
    echo 'file_uploads = On'; \
    echo 'memory_limit = 256M'; \
    echo 'upload_max_filesize = 64M'; \
    echo 'post_max_size = 64M'; \
    echo 'max_execution_time = 600'; \
} > /usr/local/etc/php/conf.d/uploads.ini

# Expose port 80
EXPOSE 80

# Khởi động Apache
CMD ["apache2-foreground"]
