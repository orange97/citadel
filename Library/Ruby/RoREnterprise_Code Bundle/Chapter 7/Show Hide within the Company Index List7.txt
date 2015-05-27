
<td><%= render :partial => 'addresses/show', 
:locals => {:address => company.address} %></td>


def show_address 
@address = Address.find(params[:id]) 
render :partial => 'addresses/show', :locals => {:address => @address} 
end 
def hide_address 
render :text => " " 
end

<td><%= render :partial => 'addresses/show', :locals => {:address => company.address} %></td>
...to:
<td><% 
show_link = "show_address_#{company.id}" 
hide_link = "hide_address_#{company.id}" 
output_place = "address_#{company.id}" 
%> 
<span id="<%= show_link -%>"> 
<%= link_to_remote "Show", 
:update => output_place, 
:url => {:action => 'show_address', :id => company.address_id}, 
:before => "$('#{output_place}').update('Loading ...')", 
:success => "$('#{show_link}').hide()", 
:complete => "$('#{hide_link}').show()" 
%> 
</span> 
<span id="<%= hide_link -%>" style="display: none;"> 
<%= link_to_remote "Hide", 
:update => output_place, 
:url => {:action => 'hide_address'},
:success => "$('#{hide_link}').hide()", 
:complete => "$('#{show_link}').show()" 
%> 
</span> 
<div id="<%= output_place -%>"></div>
</td>

