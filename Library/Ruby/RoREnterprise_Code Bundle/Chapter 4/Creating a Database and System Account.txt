
$ mysql -u root –p
mysql> CREATE DATABASE intranet_development;
Query OK, 1 row affected (0.05 sec)
mysql> GRANT ALL ON intranet_development.* TO intranet@localhost IDENTIFIED BY 'police73';
Query OK, 0 rows affected (0.01 sec)
mysql> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.00 sec)

