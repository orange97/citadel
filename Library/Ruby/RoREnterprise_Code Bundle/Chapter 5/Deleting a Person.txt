
class PeopleController < ApplicationController 
before_filter :get_person, :only => [:show, :edit, :update, :confirm, :delete] 
verify :method => :post, :only => [:create, :update, :delete], 
:redirect_to => {:action => :index} 
# ... other methods ... 
def confirm 
@page_title = "Do you really want to delete \ 
#{@person.full_name}?" 
end 
def delete 
if 'yes' == params[:confirm] 
@person.destroy 
redirect_to_index 'Person deleted successfully' 
end 
end 
# ... private methods ...
End

<h1><%= @page_title %></h1>
<% form_tag :action => 'delete', :id => @person.id do %> 
<%= hidden_field_tag 'confirm', 'yes' %> 
<p><%= submit_tag 'Yes' %> | 
<%= link_to 'Cancel', request.referer %></p>
<% end %>

<td>
<%= link_to 'Edit', :action => 'update', :id => person.id %> | 
<%= link_to 'Delete', :action => 'confirm', :id => person.id %>
</td>
