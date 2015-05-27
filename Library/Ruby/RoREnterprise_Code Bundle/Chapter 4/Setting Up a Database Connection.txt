
development: 
adapter: mysql 
database: Intranet_development 
username: root 

password: 
host: localhost
test: 
adapter: mysql 
database: Intranet_test 
username: root 
password: 
host: localhost
production: 
adapter: mysql 
database: Intranet_production 
username: root 
password: 
host: localhost

{ 
'development' => {...}, 
'test' => {...}, 
'production' => {...}
}

{ 
'development' => { 
'adapter' => 'mysql', 
'database' => 'Intranet_development', 
'username' => 'root', 
'password' => nil, 
'host' => 'localhost' 
}, 
'test' => {...}, 
'production' => {...}
}
