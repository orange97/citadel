
#When new job codes are added to the database or updated they are given a timestamp 
#The current timestamp is the most recent one used. 
def Jobcode.current_timestamp 
   last_timestamp = Jobcode.find(:first, :order => 'timestamp desc'). 
   timestamp 
end 

#Job numbers are only live if they have been updated 
#or added during the last update 
def is_live? 
      self.timestamp == Jobcode.current_timestamp 
end


<% @jobcodes.each do |code| -%> 
<% if code.is_live? 
class_name = "no_alert" 
else 
class_name = "alert" 
end -%> 
<tr class=<%= class_name %>>
