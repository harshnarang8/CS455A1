#!/bin/bash
sudo apt update -y
sudo apt install mysql-server -y

# mysql queries for db creation
sudo mysql --execute="CREATE DATABASE mydb; USE mydb; create table feedbacks(q1 INT NOT NULL, q2 INT NOT NULL, q3 INT NOT NULL, q4 INT NOT NULL, feedback VARCHAR(500) );"
sudo mysql --execute="GRANT ALL PRIVILEGES ON mydb.feedback TO 'root'@'%' IDENTIFIED BY '1' WITH GRANT OPTION; FLUSH PRIVILEGES;"

sudo sed -i 's/^bind-address=*/#bind-address=/' /etc/mysql/mysql.conf.d/mysqld.cnf
sudo service mysql restart
