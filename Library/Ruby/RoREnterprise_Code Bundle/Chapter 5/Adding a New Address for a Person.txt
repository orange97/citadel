
<% if address.errors[:base] -%>
<p><%= error_message_on :address, :base %></p>
<% end -%>
<p><%= label :address, 'Street 1', :required => true %><br />
<%= text_field :address, :street_1 %>
<%= error_message_on :address, :street_1 %></p>
<p><%= label :address, 'Street 2' %><br />
<%= text_field :address, :street_2 %></p>
<p><%= label :address, 'Street 3' %><br />
<%= text_field :address, :street_3 %></p>
<p><%= label :address, 'City' %><br />
<%= text_field :address, :city %></p>
<p><%= label :address, 'County' %><br />
<%= text_field :address, :county %></p>
<p><%= label :address, 'Post code', :required => true %><br />
<%= text_field :address, :post_code %>
<%= error_message_on :address, :post_code %></p>

...
<p><%= label :person, 'Notes' %><br />
<%= f.text_area :notes %></p>
<div id="address">
<h2>Enter address details (optional)</h2>
<%= render :partial => 'addresses/form', 
:locals => {:address => @address} %>
</div>
<p><%= submit_tag 'Save' %></p>

class PeopleController < ApplicationController 
# ... other actions ... 
def new
@page_title = "Add a new person" 
@person = Person.new 
@address = Address.new 
end 
def create 
@person = Person.new(params[:person]) 
@person.build_address(params[:address]) 
if @person.save 
redirect_to_index 'Person added successfully' 
else 
@page_title = "Add a new person" 
@address = @person.address 
render :action => 'new' 
end 
end 
end

class Address < ActiveRecord::Base 
# ... other methods ... 
# Look up or initialize an address from params
# if street_1 or post_code supplied; 
# otherwise return nil; NB does not save the address. 
# 
# +params+ is a hash of name/value pairs used to set 
# the attributes of the Address instance. 
def self.from_street_1_and_post_code(params) 
params ||= {} 
street_1 = params[:street_1] 
post_code = params[:post_code] 
if street_1.blank? and post_code.blank? 
address = nil 
else 
address = find_or_initialize_by_street_1_and_post_code(street_1, post_code) 
address.attributes = params 
end 
address 
end
end

class PeopleController < ApplicationController 
# ... other actions ... 
def create 
@person = Person.new(params[:person]) 
@person.address = Address.from_street_1_and_post_code(params[ :address]) 
@address = @person.address || Address.new 
if @person.save 
redirect_to_index 'Person added successfully' 
else 
@page_title = "Add a new person" 
render :action => 'new' 
end 
end 
end
