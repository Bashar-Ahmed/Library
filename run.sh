#! /bin/bash

composer install
curl -s https://getcomposer.org/installer | php
composer dump-autoload

sudo nano /etc/apache2/sites-available/library.local.conf
echo "127.0.0.1      library.local" >> /etc/hosts

sudo a2ensite enable library.local.conf
sudo a2enmod rewrite
sudo service apache2 reload