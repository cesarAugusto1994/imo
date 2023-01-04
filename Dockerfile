FROM php:7.4-fpm

ENV DEBIAN_FRONTEND=noninteractive

# Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libc-client-dev \
    libkrb5-dev \
    libmcrypt-dev \
    zlib1g-dev \
    libicu-dev \
    mariadb-client \
    g++ \
    npm \
    libzip-dev \
    libonig-dev

RUN curl -sL https://deb.nodesource.com/setup_12.x  | bash -
# RUN apt-get -y install nodejs npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl 
RUN docker-php-ext-install gd
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install intl && docker-php-ext-configure intl
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl && docker-php-ext-install imap

#RUN docker-php-ext-install imap
#RUN docker-php-ext-install curl
RUN docker-php-ext-install exif
#RUN pecl install mcrypt-1.0.1 && docker-php-ext-enable mcrypt

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# RUN npm install

# Copy existing application directory contents
# COPY . /var/www

# VOLUME /var/www
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www
# RUN chmod 755 -R .

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]