
class PeopleController < ApplicationController 
# ... other actions ... 
# Only accept post requests to the new action; # redirect to index otherwise 
verify :method => :post, :only => :create, :redirect_to => {:action => :index} 
# Display a form to add a person, or attempt to save 
# if data posted in the request. 
def new 
@page_title = 'Add a new person' 
@person = Person.new 
end 
# Save submitted data to the database 
def create 
@person = Person.new(params[:person]) 
if @person.save 
redirect_to :action => 'index' 
else 
@page_title = 'Add a new person' 
render :action => 'create' 
end 
end
end

<% form_for :person, @person, :url => {:action => 'create'} do |f| %>
<p><strong><label for="person_first_name">First name</label>:</strong><br />
<%= f.text_field :first_name %></p>
<p><strong><label for="person_last_name">Last name</label>:</strong><br />
<%= f.text_field :last_name %>
</p>
<p><strong><label for="person_email">Email address</label>:</strong><br />
<%= f.text_field :email %></p>
<p><strong><label for="person_gender">Gender</label>:</strong> 
<%= f.select :gender, Person::GENDERS.keys %></p>
<p><%= submit_tag 'Save' %></p>
<% end %>
