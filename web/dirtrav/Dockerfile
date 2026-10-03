FROM php:8.3-apache
RUN sh -c "echo 'gator{m4try0shk4_d0ll5}' > /flag.txt"
RUN chown -R www-data:www-data /var/www/html
RUN find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \;

