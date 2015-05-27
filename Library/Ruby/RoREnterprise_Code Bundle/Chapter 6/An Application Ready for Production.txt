
class CreateTestThings < ActiveRecord::Migration 
def self.up 
create_table :test_things do |t| 
t.column :name, :string 
end 
end 
def self.down 
drop_table :test_things 
end 
end

development: 
adapter: mysql 
database: Test 
username: root 
password: password 
host: localhost 
test: 
adapter: mysql 
database: Test 
username: root 
password: password 
host: localhost 
production: 
adapter: mysql 
database: Test 
username: root 
password: password 
host: localhost
