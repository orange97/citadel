
class PeopleController < ApplicationController 
# .. other actions ... 
# Add update to the list of actions, which only 
# accept post requests 
verify :method => :post, :only => [:create, :update], 
:redirect_to => {:action => :index} 
def edit 
@person = Person.find(params[:id]) 
@page_title = 'Editing ' + @person.full_name 
end 
def update 
@person = Person.find(params[:id]) 
if @person.update_attributes(params[:person]) 
flash[:notice] = 'Person updated successfully' 
redirect_to :action => 'index' 
else
@page_title = 'Editing ' + @person.full_name 
render :action => 'edit' 
end 
end
end

<% form_for :person, @person, 
:url => {:action => 'create'} do |f| %>
<%= render :partial => 'form', :locals => {:f => f} %>
<% end %>

<% form_for :person, @person, 
:url => {:action => 'update', :id => @person.id} do |f| %>
<%= render :partial => 'form', :locals => {:f => f} %>
<% end %>

<table>
<tr>
<th>Name</th>
<th>Actions</th>
</tr>
<% for person in @people -%>
<% full_name = person.last_name + ', ' + person.first_name -%>
<tr>
<td>
<%= link_to full_name, { :action => 'show', :id => person.id }, 
{ :title => "Show details", :class => "person_link" } %>
</td>
<td>
<%= link_to 'Edit', :action => 'edit', :id => person.id %>
</td>
</tr>
<% end -%>
</table>

