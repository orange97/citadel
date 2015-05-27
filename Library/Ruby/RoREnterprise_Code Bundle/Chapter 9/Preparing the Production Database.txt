
$ mysql -uroot -p

mysql> CREATE DATABASE intranet_production;
mysql> GRANT ALL ON intranet_production.* TO intranet@localhost IDENTIFIED BY 'police73';
mysql> FLUSH PRIVILEGES;


production: 
adapter: mysql 
database: 'intranet_production' 
username: intranet 
password: police73 
host: localhost

