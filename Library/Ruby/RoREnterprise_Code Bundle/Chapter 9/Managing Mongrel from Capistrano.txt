
# Where to store Mongrel PID file
mongrel_pid = "#{shared_path}/pids/mongrel.pid"
# Port to run on
port = 4000
desc "Override the spinner task with one which starts Mongrel"
task :spinner, :roles => :app do 
run <<-CMD 
mongrel_rails start -e production -p #{port} 
-P #{mongrel_pid} -c #{current_path} -d 
CMD
end
desc "Alias for spinner"
task :start do 
spinner
end
desc "Override the restart task with one which restarts Mongrel"
task :restart, :roles => :app do 
run "mongrel_rails restart -P #{mongrel_pid}"
end
desc "Stop Mongrel"
task :stop, :roles => :app do 
run "mongrel_rails stop -P #{mongrel_pid}"
end


$ cap start
$ cap stop
$ cap restart