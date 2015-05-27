
<div id="drop_place_id">drop it here</div>
<%= drop_receiving_element :drop_place_id %>


<div id="address_drop">
<h2>Address drop</h2>
<p><span id="address_drop_output">Drop an address here.</span></p>
</div>
<%= drop_receiving_element :address_drop, 
:update => "address_drop_output", 
:url => {:action => 'show_address'}, 
:before => "$('address_drop_output').update('Loading ...')" -%>


<% 
show_link = "show_address_for_company_#{company.id}" 
hide_link = "hide_address_for_company_#{company.id}" 
output_place = "address_for_company_#{company.id}"
%>
<span id="<%= show_link -%>"> 
<%= link_to_remote "Show", 
:update => output_place, 
:url => {:action => 'show_address', :id => output_place}, 
:before => "$('#{output_place}').update('Loading ...')", 
:success => "$('#{show_link}').hide()", 
:complete => "$('#{hide_link}').show()" 
%>
</span>


def show_address 
@address = Company.find(params[:id].delete( "address_for_company_")).address 
render :partial => 'addresses/show', :locals => { :address => @address} 
end

