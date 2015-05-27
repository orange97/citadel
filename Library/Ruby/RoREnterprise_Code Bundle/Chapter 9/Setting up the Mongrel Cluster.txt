
$ mongrel_rails cluster::configure -e production -p 4000 -N 3 \
-c /home/captain/apps/Intranet/current/ -a 127.0.0.1 \
-C /home/captain/apps/Intranet/shared/system/intranet_cluster.yml \
-P /home/captain/apps/Intranet/shared/pids/mongrel.pid \
--user captain --group captain


user: captain
cwd: /home/captain/apps/Intranet/current/
port: "4000"
environment: production
group: captain
address: 127.0.0.1
pid_file: /home/captain/apps/Intranet/shared/pids/mongrel.pid
servers: 3


$ sudo /etc/init.d/mongrel_intranet stop


#!/bin/bash
# Ubuntu Linux init script for Rails application in cluster
# set these variables to your production environment
CONF=/home/captain/apps/Intranet/shared/system/intranet_cluster.yml
APP_NAME="Intranet"
# more variables - you shouldn't need to change this 
MONGREL="/usr/bin/mongrel_rails"
# load library functions
. /lib/lsb/init-functions
case "$1" in 
start) 
log_begin_msg "Starting Mongrel cluster: $APP_NAME" 
$MONGREL cluster::start -C $CONF 
log_end_msg 0 
;; 
stop) 
log_begin_msg "Stopping Mongrel cluster: $APP_NAME" 
$MONGREL cluster::stop -C $CONF 
log_end_msg 0 
;; 
restart) 
log_begin_msg "Restarting Mongrel cluster: $APP_NAME" 
$MONGREL cluster::restart -C $CONF 
log_end_msg 0 
;; 
*) 
echo "Usage: $0 {start|stop|restart}" 
exit 1 
;;
esac
exit 0


$ sudo /etc/init.d/mongrel_intranet start


# Cluster config file location
cluster_config = "#{shared_path}/system/intranet_cluster.yml"
desc "Override the spinner task with one which starts Mongrel"
task :spinner, :roles => :app do 
run <<-CMD 
sudo mongrel_rails cluster::start -C #{cluster_config} 
CMD
end
desc "Alias for spinner"
task :start do 
spinner
end
desc "Override the restart task with one which restarts Mongrel"
task :restart, :roles => :app do 
run "sudo mongrel_rails cluster::restart -C #{cluster_config}"
end
desc "Stop Mongrel"
task :stop, :roles => :app do 
run "sudo mongrel_rails cluster::stop -C #{cluster_config}"
end



