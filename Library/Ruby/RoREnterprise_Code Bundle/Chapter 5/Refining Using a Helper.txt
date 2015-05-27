
module ApplicationHelper 
... 
# Display +field_value+ followed by a <br> element, 
# but only if +field_value+ is set; otherwise return nil. 
def field_with_break(field_value) 
unless field_value.blank? 
return field_value + tag('br') 
else 
return nil 
end 
end
end

<p><strong>Address:</strong><br/>
<% address = @person.address -%>
<% if address -%>
<%= address.street_1 %><br/>
<%= field_with_break address.street_2 -%>
<%= field_with_break address.street_3 -%>
<%= field_with_break address.county -%>
<%= field_with_break address.city -%>
<%= address.post_code %>
<% else -%>
<%=d nil %>
<% end -%>
</p>

Showing an Address with a Partial
<% if address -%>
<%= address.street_1 %><br/>
<%= field_with_break address.street_2 -%>
<%= field_with_break address.street_3 -%>
<%= field_with_break address.city -%>
<%= field_with_break address.county -%>
<%= address.post_code %>
<% else -%>
<%= d %>
<% end -%>
...
<p><strong>Notes:</strong><br/><%=d @person.notes %></p>
<p><strong>Address:</strong></p>
<p><%= render :partial => 'addresses/show', 
:locals => {:address => @person.address} %></p>

<% for company in @companies -%>
<tr>
<td>
<%= link_to company.name, { :action => 'show', :id => company.id }, 
{ :title => "Show details for this company" } %>
</td>
<td><%= company.telephone %></td>
<td><%= company.fax %></td>
<td><%= link_to(company.website, company.website) %></td>
<td><%= render :partial => 'addresses/show', 
:locals => {:address => company.address} %></td>
</tr>
<% end -%>
