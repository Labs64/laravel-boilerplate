FROM centos:7

MAINTAINER Labs64 GmbH info@labs64.com

# Install some must-haves
RUN yum -y install vim wget sendmail
RUN yum -y install libtool make automake autoconf nasm libpng-static
RUN yum -y install git
RUN git --version

# Install PHP 7.1 on CentOS
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
	&& rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum install yum-utils
RUN yum-config-manager --enable remi-php71

RUN yum -y install php71w \
					         php71w-bcmath \
					         php71w-cli \
					         php71w-common \
					         php71w-curl \
					         php71w-fpm \
					         php71w-gd \
					         php71w-ldap \
					         php71w-imap \
					         php71w-intl \
					         php71w-mbstring \
					         php71w-mcrypt \
					         php71w-mysqlnd \
					         php71w-opcache \
					         php71w-pdo \
					         php71w-pear \
					         php71w-pecl-apcu \
					         php71w-pecl-imagick \
					         php71w-pgsql \
					         php71w-process \
					         php71w-pspell \
					         php71w-recode \
					         php71w-soap \
					         php71w-tidy \
					         php71w-xml

RUN php -v

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
RUN curl -sL https://rpm.nodesource.com/setup_7.x | bash -
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
