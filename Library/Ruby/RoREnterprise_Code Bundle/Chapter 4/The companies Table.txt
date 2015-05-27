
class CreateCompanies < ActiveRecord::Migration 
def self.up 
create_table :companies do |t| 
t.column :name, :string, :null => false 
t.column :telephone, :string, :limit => 50 
t.column :fax, :string, :limit => 50 
t.column :website, :string 
t.column :address_id, :integer 
t.column :created_at, :timestamp 
t.column :updated_at, :timestamp 
end 
end 
def self.down 
drop_table :companies 
end
end
