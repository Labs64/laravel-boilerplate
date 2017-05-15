#!/bin/bash

if [ -f "./wordpress/wp-config.php" ];
then
	echo "WordPress config file found."
else
	echo "WordPress config file not found. Installing..."
	docker-compose exec --user www-data phpfpm wp core download
	docker-compose exec --user www-data phpfpm wp core config --dbhost=mysql --dbname=wordpress --dbuser=root --dbpass=password
fi