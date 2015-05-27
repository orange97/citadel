
$ ruby script/generate model User

class CreateUsers < ActiveRecord::Migration 
def self.up 
create_table :users do |t| 
t.column :username, :string, :null => false 
t.column :passwd, :string, :null => false 
t.column :last_login, :datetime 
end 
end 
def self.down 
drop_table :users 
end
end

$ rake db:migrate

require 'digest/sha1'
class User < ActiveRecord::Base 
validates_presence_of :username 
validates_uniqueness_of :username 
validates_presence_of :passwd 
def passwd=(pwd) 
write_attribute('passwd', Digest::SHA1.hexdigest(pwd)) 
end
end

$ ruby script/console
Loading development environment.
>> u = User.new :username => 'elliot', :passwd => 'police73'
=> #<User:0xb711f848 @attributes={"passwd"=>"bdbc07452121cfe2f35ff510b291c09b2418d2db", "username"=>"elliot"}, @new_record=true>
>> u.save
=> true