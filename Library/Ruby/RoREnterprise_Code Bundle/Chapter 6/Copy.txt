
<% @jobcodes.each do |code| -%> 
<% if code.timestamp == @lastest_timestamp 
class_name = "no_alert" 
else 
class_name = "alert" 
end -%> 
<tr class=<%= class_name %>>
