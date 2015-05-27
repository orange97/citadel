
#!/bin/bash
# Ubuntu Linux init script for Rails application
# set these variables to your production environment
APP_USER=captain
APP_NAME=Intranet
APP_PORT=4000
APP_HOME=/home/captain/apps/Intranet
# more variables - you don't need to set these
CURRENT=$APP_HOME/current
PID=$APP_HOME/shared/pids/mongrel.pid
MONGREL="sudo -u $APP_USER /usr/bin/mongrel_rails"
ENVIRONMENT=production
# load library functions
. /lib/lsb/init-functions
case "$1" in 
start) 
log_begin_msg "Starting Rails application $APP_NAME" 
$MONGREL start -c $CURRENT -e $ENVIRONMENT -p $APP_PORT -P $PID -d 
log_end_msg 0 
;; 
stop) 
log_begin_msg "Stopping Rails application $APP_NAME" 
$MONGREL stop -P $PID 
log_end_msg 0 
;; 
restart) 
log_begin_msg "Restarting Rails application $APP_NAME" 
$MONGREL restart -P $PID 
log_end_msg 0 
;; 
*) 
echo "Usage: $0 {start|stop|restart}" 
exit 1 
;;
esac
exit 0



//make the script executable:
$ chmod +x script/mongrel_init


$ sudo cp script/mongrel_init /etc/init.d/mongrel_intranet


$ sudo update-rc.d mongrel_intranet defaults




