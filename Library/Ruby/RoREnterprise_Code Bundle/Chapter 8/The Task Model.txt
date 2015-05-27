
//Generate a model from the command line:
$ ruby script/generate model Task

class CreateTasks < ActiveRecord::Migration 
def self.up 
create_table :tasks do |t| 
t.column :title, :string, :null => false 
t.column :description, :text 
t.column :user_id, :integer 
t.column :person_id, :integer 
t.column :complete, :boolean, :null => false, 
:default => false 
t.column :start, :datetime, :null => false 
t.column :end, :datetime 
end 
end 
def self.down 
drop_table :tasks 
end
end

class Task < ActiveRecord::Base 
belongs_to :person 
belongs_to :user 
validates_presence_of :title, :message => 'Please supply a title' 
validates_associated :person, :message => 'The specified person is invalid' 
validates_associated :user, :message => 'The specified owner is invalid' 
validates_presence_of :start, 
:message => 'Please set a start date and time for the task'
end

class Person < ActiveRecord::Base 
include AddressHandler 
belongs_to :company 
belongs_to :address 
has_many :tasks, :order => 'complete ASC, start DESC', 
:dependent => :nullify 
# ... other methods ...
end

class User < ActiveRecord::Base 
has_many :tasks, :order => 'complete ASC, start DESC', 
:dependent => :nullify 
# ... other methods ...
end