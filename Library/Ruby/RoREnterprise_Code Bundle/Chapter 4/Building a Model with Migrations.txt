$ ruby script/generate model Person 
exists app/models/ 
exists test/unit/ 
exists test/fixtures/ 
create app/models/person.rb 
create test/unit/person_test.rb 
create test/fixtures/people.yml 
exists db/migrate 
create db/migrate/001_create_people.rb

class CreatePeople < ActiveRecord::Migration 
def self.up 
create_table :people do |t| 
# t.column :name, :string 
end 
end 
def self.down 
drop_table :people 
end
end
