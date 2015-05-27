
class PeopleController < ApplicationController 
before_filter :get_person, :only => [:show, :update, 
:edit, :confirm, :delete] 
verify :method => :post, :only => [:create, :update, 
:delete], :redirect_to => {:action => :index} 
# ... other methods ... 
def edit 
@page_title = 'Editing ' + @person.full_name 
@address = @person.address || Address.new 
end 
def update 
@person.address = Address.from_street_1_and_post_code(params[:address]) 
@address = @person.address || Address.new 
if @person.update_attributes(params[:person]) 
redirect_to_index 'Person updated successfully' 
else 
@page_title = 'Editing ' + @person.full_name 
render :action => 'edit' 
end 
end
end

<% form_for :person, @person, 
:url => {:action => 'update', :id => @person.id} do |f| %>
<%= render :partial => 'form', :locals => {:f => f} %>
<% end %>
