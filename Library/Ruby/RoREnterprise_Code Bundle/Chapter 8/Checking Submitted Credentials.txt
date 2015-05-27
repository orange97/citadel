
class User < ActiveRecord::Base 
# ... other methods, validation etc. 
def self.authenticate(username, passwd) 
hashed_passwd = Digest::SHA1.hexdigest(passwd) 
user = self.find_by_username_and_passwd(username, hashed_passwd) 
return user 
end
end


require File.dirname(__FILE__) + '/../test_helper'
class UserTest < Test::Unit::TestCase 
def setup 
User.new(:username => 'elliot', :passwd => 'police73').save 
end 
def test_authenticate 
assert User.authenticate('elliot', 'police73') 
assert !(User.authenticate('elliot', 'bilbo')) 
assert !(User.authenticate('frank', 'police73')) 
end
end

//and run it with:
$ rake test:units

class LoginController < ApplicationController 
def index 
end 
def logout 
end 
def check_credentials 
username = params[:login][:username] 
passwd = params[:login][:passwd] 
user = User.authenticate(username, passwd) 
redirect_to_index "Logged in OK? " + (!(user.nil?)).to_s 
end
end

class LoginController < ApplicationController 
def index 
end 
def check_credentials 
username = params[:login][:username] 
passwd = params[:login][:passwd] 
# Default state is NOT to be logged in. 
session[:logged_in] = false 
user = User.authenticate(username, passwd) 
unless user.nil? 
# Set a marker in the session to show user is logged in. 
session[:logged_in] = true 
# Set a login success notice. 
flash[:notice] = "You have logged in successfully" 
# Store the login date and time. 
user.last_login = Time.now 
user.save 
# Store the user in the session. 
session[:user] = user 
# Set the destination to the protected page originally 
# requested, or to the list of people if coming in fresh. 
destination = session[:destination] || 
{:controller => 'people'} 
else 
# Redirect back to the login form. 
destination = {:controller => 'login'} 
# Set a login failure notice.
flash[:notice] = "Your username and/or password were not recognised" 
end 
redirect_to destination 
end
end