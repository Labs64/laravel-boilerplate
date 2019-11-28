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

RUN yum -y install php
RUN yum -y install php-bcmath
RUN yum -y install php-cli
RUN yum -y install php-common
RUN yum -y install php-curl
RUN yum -y install php-fpm
RUN yum -y install php-gd
RUN yum -y install php-ldap
RUN yum -y install php-intl
RUN yum -y install php-mbstring
RUN yum -y install php-mysqlnd
RUN yum -y install php-opcache
RUN yum -y install php-pdo
RUN yum -y install php-pear
RUN yum -y install php-pecl-apcu
RUN yum -y install php-pgsql
RUN yum -y install php-process
RUN yum -y install php-recode
RUN yum -y install php-soap
RUN yum -y install php-xml
#RUN yum -y install php-imap
#RUN yum -y install php-mcrypt
#RUN yum -y install php-pecl-imagick
#RUN yum -y install php-pspell
#RUN yum -y install php-tidy

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
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
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
