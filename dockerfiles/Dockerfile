FROM centos:8

MAINTAINER Labs64 GmbH info@labs64.com

# Install some must-haves
RUN yum -y install vim wget sendmail
RUN yum -y install git
RUN git --version

# Install PHP 7.2 on CentOS
RUN yum repolist
RUN yum module list | grep php
RUN yum module -y install php:7.2
RUN php -v

RUN yum -y install \
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

#RUN yum -y install php-imap php-mcrypt php-pecl-imagick php-pspell php-tidy

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
