
task :symlink_for_file_uploads, :roles => :app do 
run <<-CMD 
mkdir -p -m 775 #{shared_path}/system/files && 
rm -Rf #{release_path}/public/files && 
ln -s #{shared_path}/system/files #{release_path}/public/files 
CMD
end


task :after_update_code do 
symlink_for_file_uploads
end


$ cap deploy 
... 
* executing task after_update_code 
* executing task symlink_for_file_uploads 
* executing "mkdir -p -m 775 /home/captain/apps/Intranet/shared/system/files &&\n rm -Rf /home/captain/apps/Intranet/releases/20070428155358/public/files &&\n ln -s /home/captain/apps/Intranet/shared/system/files /home/captain/apps/Intranet/releases/20070428155358/public/files" 
...


$ ls -go
total 44
-rw-rw-r-- 1 235 2007-04-28 16:50 404.html
-rw-rw-r-- 1 309 2007-04-28 16:50 500.html
-rwxrwxr-x 1 477 2007-04-28 16:50 dispatch.cgi
-rwxrwxr-x 1 859 2007-04-28 16:50 dispatch.fcgi
-rwxrwxr-x 1 476 2007-04-28 16:50 dispatch.rb
-rw-rw-r-- 1 0 2007-04-28 16:50 favicon.ico
lrwxrwxrwx 1 47 2007-04-28 16:50 files -> /home/captain/apps/Intranet/shared/system/files
drwxrwxr-x 3 4096 2007-04-28 16:43 images
-rw-rw-r-- 1 7552 2007-04-28 16:50 index.html
drwxrwxr-x 3 4096 2007-04-28 16:43 javascripts
-rw-rw-r-- 1 99 2007-04-28 16:50 robots.txt
drwxrwxr-x 3 4096 2007-04-28 16:43 stylesheets
lrwxrwxrwx 1 41 2007-04-28 16:50 system -> /home/captain/apps/Intranet/shared/system