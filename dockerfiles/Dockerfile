FROM centos:7

MAINTAINER Labs64 GmbH info@labs64.com

# Install some must-haves
RUN yum -y update
RUN yum -y install vim wget
RUN yum -y install git
RUN git --version

# Install PHP 7.1 on CentOS
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
	&& rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum install yum-utils
RUN yum-config-manager --enable remi-php71
RUN yum -y update

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

# Copy supervisor configuration file
RUN yum -y install supervisor
#COPY config/etc/supervisord.conf /etc/supervisord.conf
COPY config/php/php-fpm.conf /etc/php-fpm.conf
COPY config/php/www.conf /etc/php-fpm.d/www.conf

# Forward logs to docker log collector
RUN ln -sf /dev/stdout /var/log/php-fpm/access.log \
  && ln -sf /dev/stderr /var/log/fpm-php.www.log \
  && ln -sf /dev/stderr /var/log/php-fpm/fpm-error.log

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
RUN composer --version

# Install Node.js
RUN curl -sL https://rpm.nodesource.com/setup_7.x | bash -
RUN yum -y install nodejs
RUN yum list installed nodejs
RUN node -v

# Clean up
RUN yum clean all

# Define work directory
WORKDIR /var/www

# Expose ports
EXPOSE 9000

#CMD ["/usr/bin/supervisord"]
CMD ["php-fpm", "-F", "-O"]
