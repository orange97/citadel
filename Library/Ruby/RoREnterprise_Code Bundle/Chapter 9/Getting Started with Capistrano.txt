
$ cap --apply-to /home/demo/Intranet


role :db, "db02.example.com", "db03.example.com"


set :application, "Intranet"
role :web, "server.company.local"
role :app, "server.company.local"
role :db, "server.company.local", :primary => true


$ sudo groupadd captain
$ sudo useradd --create-home -g captain captain
$ sudo passwd captain
Enter new UNIX password:
Retype new UNIX password:
passwd: password updated successfully
$ sudo mkdir /home/captain/apps
$ sudo chown captain.users /home/captain/apps

set :user, "captain"
set :password, "police73"

svn+ssh://captain@server.company.local/repository/#{application}/trunk

set :deploy_to, "/home/captain/apps/#{application}"