
ip_address = "192.168.13.129"
set :application, "Intranet"
role :web, ip_address
role :app, ip_address
role :db, ip_address, :primary => true
set :user, "captain"
set :password, "police73"
set :repository, "svn+ssh://captain@#{ip_address}/repository/#{application}/trunk"
set :deploy_to, "/home/captain/apps/#{application}"

