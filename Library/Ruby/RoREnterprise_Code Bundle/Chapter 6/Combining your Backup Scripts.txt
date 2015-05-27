
def run(command) 
IO.popen(command, 'r+') do |io| 
io.close_write 
output = io.readlines 
for line in output 
puts line 
end
  end
end
filename = "svn_output#{Time.new.strftime('%Hh%Mm%Ss%a%d%b%Y')}.dump"
repository_location = 'c:\repository'
run("svnadmin dump #{repository_location} > #{filename}")
filename = "mysql_output#{Time.new.strftime('%Hh%Mm%Ss%a%d%b%Y')}.sql"
run("mysqldump --all-databases -u root --password=PASSWORD > #{filename}")

