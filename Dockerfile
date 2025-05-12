# Create an image using php 8.3, Apache Web Server and SO Debian 12.8
# FROM php:8.4-apache
FROM php:8.3-apache

# Para usar la versión de PHP 8.4 (Probar copiando el folder \Vendor sin ejecutar > composer install)

# Configure the Working Directory
WORKDIR /var/www/html/app

# Exposes the 80 port
EXPOSE 80

# Copy the source code to working directory
COPY . ./

# Update packages and add extensions
RUN apt-get update && apt-get install -y \
libpng-dev \
libjpeg-dev \
libfreetype6-dev \
libonig-dev \
libxml2-dev \
zip \
unzip \
git \
curl \
gnupg2 \
&& docker-php-ext-configure gd --with-freetype --with-jpeg

    # Install Node.js y npm (version LTS)
    # RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# Install composer to manage PHP dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN composer install

    # Installs all the necessary dependencies for the application
    # RUN npm install

# Permissions configurations for Laravel
RUN chown -R www-data:www-data /var/www/html/app && chmod -R 777 /var/www/html/app

# Install y Activación de SQL Server drivers (Linux Debian 12)
RUN apt update && apt upgrade -y && \
	curl -fsSL https://packages.microsoft.com/keys/microsoft.asc | tee /usr/share/keyrings/microsoft.asc && \
	echo "deb [signed-by=/usr/share/keyrings/microsoft.asc] https://packages.microsoft.com/debian/12/prod bookworm main" | tee /etc/apt/sources.list.d/mssql-release.list && \
	apt update && \
	ACCEPT_EULA=Y
	
	# Estos comandos se ejecutan manualmente por problemas con la licencia de usuario final
	#  apt install -y msodbcsql18 unixodbc unixodbc-dev  && \
	#  pecl install sqlsrv pdo_sqlsrv && \
	#  docker-php-ext-enable sqlsrv pdo_sqlsrv

# Enable rewrite from Apache
RUN a2enmod rewrite

# Run command to start apache web server
CMD ["apache2-foreground"]
