#!/bin/bash

sudo apt update -y
#installs everything with single command
sudo apt install lamp-server^ -y
sudo chmod -R 0755 /var/html/

sudo systemctl enable apache2
sudo systemctl start apache2

#copy website to the html/ folder
sudo cp index.html index.php stats.php /var/www/html/