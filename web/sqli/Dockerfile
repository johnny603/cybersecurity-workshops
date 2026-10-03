FROM php:8.3-apache

RUN apt-get update && apt-get install -y openssh-server \
    && rm -rf /var/lib/apt/lists/*

RUN echo 'root:pass' | chpasswd

RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config \
    && sed -i 's/#PermitRootLogin yes/PermitRootLogin yes/' /etc/ssh/sshd_config

RUN mkdir -p /var/run/sshd

RUN sh -c "echo 'gator{th3_ult1m4te_h4ck3r}' > /flag.txt"

# Install and enable the mysqli extension permanently
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Standard web directory execution
WORKDIR /var/www/html

EXPOSE 80 22

CMD ["sh", "-c", "/usr/sbin/sshd && apache2-foreground"]
