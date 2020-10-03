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
RUN apt-get install vim wget sendmail
RUN apt-get install git
RUN git --version

RUN apt-get install \
    php \
    php-bcmath \
    php-cli \
    php-common \
    php-curl \
    php-fpm \
    php-gd \
    php-ldap \
    php-intl \
    php-mbstring \
    php-mysqlnd \
    php-opcache \
    php-pdo \
    php-pear \
    php-pecl-apcu \
    php-pgsql \
    php-process \
    php-recode \
    php-soap \
    php-xml \
    php-zip

#RUN apt-get install php-imap php-mcrypt php-pecl-imagick php-pspell php-tidy

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
RUN yum -y install nodejs
RUN yum list installed nodejs
RUN node -v

# Final update and clean up
RUN yum -y update
RUN yum clean all

# Define work directory
WORKDIR /var/www/laravel-boilerplate

# Expose ports
EXPOSE 9000

CMD ["php-fpm", "-F", "-O"]
