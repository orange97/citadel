
class PeopleController < ApplicationController 
# ... more actions ... 
def create 
@person = Person.new(params[:person]) 
if request.post? and @person.save 
flash[:notice] = 'Person added successfully' 
redirect_to :action => 'index' 
else 
@page_title = 'Add a new person' 
render :action => 'new' 
end 
end
end

<div id="content">
<% if flash[:notice] -%>
<p class="notice"><%= flash[:notice] %></p>
<% end -%>
<%= yield %>
</div>
