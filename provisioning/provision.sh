#!/bin/bash

# Install htop because it's awesome and should be included by default on everything ever
apt-get install -y htop

# Allocate some swap space
fallocate -l 1G /swapfile
chmod 600 /swapfile
mkswap /swapfile
swapon /swapfile

# Install composer deps
/usr/bin/php /usr/local/bin/composer install --working-dir /var/www

