
#!/usr/bin/env ruby
# Rotate logs on production server; call via cron
LOG_ROOT = File.join(File.dirname(__FILE__), '../log')
suffix = Time.now.strftime('%Y-%m-%d')
['mongrel', 'production'].each do |log_for| 
log_file = File.join(LOG_ROOT, log_for + '.log') 
archived_log_file = log_file + '.' + suffix 
File.rename(log_file, archived_log_file) 
File.new(log_file, 'w')
end


7 0 * * * /usr/bin/ruby \ /home/captain/apps/Intranet/current/script/rotate_logs


desc "Make all custom scripts (in script directory) executable"
task :make_scripts_executable, :roles => :app do 
run "chmod -R u+x #{release_path}/script"
end
task :after_update_code do 
symlink_for_file_uploads 
make_scripts_executable
end

