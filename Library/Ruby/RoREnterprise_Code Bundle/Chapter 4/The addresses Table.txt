
$ ruby script/generate model Address
class CreateAddresses < ActiveRecord::Migration 
def self.up 
create_table :addresses do |t| 
t.column :street_1, :string, :null => false 
t.column :street_2, :string 
t.column :street_3, :string 
t.column :city, :string 
t.column :county, :string 
t.column :post_code, :string, :limit => 10, :null => false 
t.column :created_at, :timestamp 
t.column :updated_at, :timestamp 
end 
end 
def self.down 
drop_table :addresses 
end
end
