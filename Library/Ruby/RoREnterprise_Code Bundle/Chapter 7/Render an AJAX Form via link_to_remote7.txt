
<td><%= company.telephone %></td>

<td><% 
tele_output = "telephone_#{company.id}" 
-%> 
<%= link_to_remote "+", 
:update => tele_output, 
:url => {:action => 'show_update_telephone', :id => company.id } -%> 
<span id="<%= tele_output -%>"><%= company.telephone -%></span>
</td>


def show_update_telephone 
@company = Company.find(params[:id]) 
render :partial => 'update_telephone', :locals => { :company => @company} 
end 
def update_telephone 
@company = Company.find(params[:id]) 
@company.telephone = params[:telephone] 
@company.save 
render :text => @company.telephone 
end


<% tel_output = "telephone_#{company.id}" 
tel_form = "telephone_form_#{company.id}" %>
<div id=<%= tel_form %>> 
<%= form_remote_tag(:update => tel_output, 
:url => { :action => :update_telephone },
:complete => "$('#{tel_form}').remove()" ) %> 
<%= text_field_tag :telephone, company.telephone %> 
<%= hidden_field_tag :id, company.id %> 
<%= submit_tag "Update" %> 
<%= end_form_tag %>
</div>
<div id="<%= tel_output %>"></div>