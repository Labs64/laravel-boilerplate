@echo off

if exist "./wordpress/wp-config.php" (
	echo "WordPress config file found."
) else (
	echo "WordPress config file not found. Installing..."
	docker-compose exec --user www-data phpfpm wp core download
	docker-compose exec --user www-data phpfpm wp core config --dbhost=mysql --dbname=wordpress --dbuser=root --dbpass=password
)