
$ ruby script/generate migration default_admin_user


class DefaultAdminUser < ActiveRecord::Migration 
def self.up 
u = User.new(:username => 'admin', :passwd => 'admin').save 
end 
def self.down 
User.find_by_username('admin').destroy 
end
end


$ cap deploy_with_migrations