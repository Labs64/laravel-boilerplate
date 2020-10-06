FROM php:7.4-fpm

ENV PHP_EXTRA_CONFIGURE_ARGS \
  --enable-fpm \
  --with-fpm-user=www-data \
  --with-fpm-group=www-data \
  --enable-intl \
  --enable-opcache \
  --enable-zip \
  --enable-calendar

# Install some must-haves
RUN apt-get update && \
    apt-get install -y \
    vim \
    wget \
    sendmail \
    git \
    zlib1g-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    libcurl4-openssl-dev \
    libldap2-dev

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-configure \
      gd --with-freetype --with-jpeg

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    curl \
    intl \
    opcache \
    pdo \
    soap \
    xml \
    zip

#RUN apt-get install php-imap php-mcrypt php-pecl-imagick php-pspell php-tidy

# install xdebug
RUN pecl install xdebug

# Prepare PHP environment
COPY config/php/php-fpm.conf /etc/php-fpm.conf
COPY config/php/www.conf /etc/php-fpm.d/www.conf
COPY config/php/php.ini /usr/local/etc/php/php.ini
COPY config/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
RUN composer --version

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
RUN node -v
RUN npm -v

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Define work directory
WORKDIR /var/www/laravel-boilerplate

# Expose ports
EXPOSE 9000

CMD ["php-fpm", "-F", "-O"]
