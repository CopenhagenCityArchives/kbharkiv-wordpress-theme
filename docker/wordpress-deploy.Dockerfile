FROM wordpress:5.7.0-php7.4-apache

# Install cron
RUN apt-get update && apt-get -y install cron

# Copy cron.conf file to the /var/www/cron.conf directory
COPY cron.conf /var/www/cron.conf

# Give execution rights on the cron job
RUN chmod 0644 /var/www/cron.conf

# Apply cron job
RUN crontab /var/www/cron.conf


# Copy theme build to temporary directory
COPY wordpress/wp-content/themes/kbharkiv /usr/src/wordpress/wp-content/themes/kbharkiv
COPY wordpress/wp-content/languages /usr/src/wordpress/wp-content/languages
COPY wordpress/robots.txt /usr/src/wordpress/robots.txt

# Ownership and permissions on theme directory
RUN chown -R www-data:www-data /usr/src/wordpress/wp-content && chmod -R 0755 /usr/src/wordpress/wp-content

# PHP configuration
RUN echo "short_open_tag = Off" > $PHP_INI_DIR/conf.d/short_open_tag.ini
RUN echo "upload_max_filesize = 128M\npost_max_size = 128M\nmax_execution_time = 120\nmemory_limit=256M" > $PHP_INI_DIR/conf.d/max_upload_size.ini

# Wordpress configuration
ENV WORDPRESS_CONFIG_EXTRA="define('FS_METHOD', 'direct'); define('DISABLE_WP_CRON', true); define( 'WP_HOME', '{site-url}' ); define( 'WP_SITEURL', '{site-url}' );"

ENV WORDPRESS_DB_HOST=${WORDPRESS_DB_HOST}
ENV WORDPRESS_DB_USER=${WORDPRESS_DB_USER}
ENV WORDPRESS_DB_PASSWORD=${WORDPRESS_DB_PASSWORD}
ENV WORDPRESS_DB_NAME=${WORDPRESS_DB_NAME}
ENV WORDPRESS_TABLE_PREFIX=${WORDPRESS_TABLE_PREFIX}

EXPOSE 80