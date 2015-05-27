
module ApplicationHelper 
# Display a default message for empty fields. 
# 
# +field_value+ is the value to process. 
def d(field_value=nil) 
if field_value.blank? 
return content_tag('em', 'not specified') 
else 
return field_value 
end 
end
end

<h1><%= @page_title %></h1>
<p><strong>Job title:</strong> <%=d @person.job_title %></p>
<p><strong>Email address:</strong> <%= mail_to @person.email %></p>
<p><strong>Telephone:</strong> <%=d @person.telephone %></p>
<p><strong>Mobile phone:</strong> <%=d @person.mobile_phone %></p>
<p><strong>Date of birth:</strong> <%=d @person.date_of_birth %></p>
<p><strong>Gender:</strong> <%= @person.gender %></p>
<p><strong>Keywords:</strong> <%=d @person.keywords %></p>
<p><strong>Notes:</strong><br/><%=d @person.notes %></p>
