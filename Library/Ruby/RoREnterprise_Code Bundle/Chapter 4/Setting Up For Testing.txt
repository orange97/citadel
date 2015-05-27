
mysql> CREATE DATABASE intranet_test;
Query OK, 1 row affected (0.18 sec)
mysql> GRANT ALL PRIVILEGES ON intranet_test.* TO intranet@localhost IDENTIFIED BY 'police73';
Query OK, 0 rows affected (0.25 sec)
mysql> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.00 sec)
test: 
adapter: mysql 
database: intranet_test 
username: intranet 
password: police73 
socket: /var/run/mysqld/mysqld.sock
$ rake test:units
(in /home/rory/workspace/Intranet)
/usr/bin/ruby1.8 -Ilib:test "/usr/lib/ruby/gems/1.8/gems/rake-0.7.1/lib/
rake/rake_test_loader.rb" "test/unit/person_test.rb" "test/unit/company_test.rb" "test/unit/address_test.rb"
Loaded suite /usr/lib/ruby/gems/1.8/gems/rake-0.7.1/lib/rake/rake_test_loader
Started
...
Finished in 0.861688 seconds.
3 tests, 3 assertions, 0 failures, 0 err