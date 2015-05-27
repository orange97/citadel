
module ApplicationHelper 
... 
# Display date in human-readable format, e.g. "8th January 1968". 
# 
# Returns +nil+ if +date_to_format+ is blank. 
def human_date(date_to_format) 
if date_to_format.blank? 
out = nil 
else 
# Get the day part of the date with 
# the "ordinal suffix" (th, rd, nd) appended 
day = date_to_format.day.ordinalize 
# strftime accepts a formatting string, which specifies 
# which parts of the date to include in the output string 
out = date_to_format.strftime("#{day} %B %Y") 
end 
out 
end
end

<p><strong>Address:</strong><br/>
<% address = @person.address -%>
<% if address -%>
<%= address.street_1 %><br/>
<%= address.street_2 + tag('br') unless address.street_2.blank? -%>
<%= address.street_3 + tag('br') unless address.street_3.blank? -%>
<%= address.city + tag('br') unless address.city.blank? -%>
<%= address.county + tag('br') unless address.county.blank? -%>
<%= address.post_code %>
<% else -%>
<%= d %>
<% end -%>
</p>
