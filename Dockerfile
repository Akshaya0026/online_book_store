FROM php:8.1-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Suppress AH00558 warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Install mysqli
RUN docker-php-ext-install mysqli

# Copy project files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
