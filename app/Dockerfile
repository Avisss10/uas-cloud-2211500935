FROM php:8.1-apache

# Install ekstensi mysqli
RUN docker-php-ext-install mysqli

# Copy semua file ke dalam container
COPY . /var/www/html/

EXPOSE 80
