
<h1><%= @page_title %></h1>
<% form_for :action => 'delete', :id => @object.id do %>
<%= hidden_field_tag 'confirm', 'yes' %>
<p><%= submit_tag 'Yes' %> | 
<%= link_to 'Cancel', request.referer %> </p>
<% end %>

def confirm 
prompt = "Do you really want to delete #{@person.full_name}?" 
confirm_delete(@person, prompt)
end 
def delete 
do_delete(@person)
end 
private
def confirm_delete(object, prompt) 
@object = object 
@page_title = prompt 
render :template => 'shared/confirm'
end 
private
def do_delete(object) 
if 'yes' == params[:confirm] 
object.destroy 
object_name = object.class.name.humanize 
redirect_to_index object_name + ' deleted successfully' 
end
end

class CompaniesController < ApplicationController 
# ... other methods ... 
def confirm 
@company = Company.find(params[:id]) 
prompt = "Do you really want to delete #{@company.name}?" 
confirm_delete(@company, prompt)
end 
def delete 
@company = Company.find(params[:id]) 
do_delete(@company) 
end
end

Attaching a Person to a Compan
class PeopleController < ApplicationController 
before_filter :get_companies, :only => [:edit, :new, :update, 
:create] 
# ... other methods ... 
private 
def get_companies 
@companies = Company.find(:all, :order => 'name') 
end
end
<h2>Company (optional)</h2>
<p><%= f.collection_select(:company_id, @companies, :id, :name, :include_blank => true) 
%></p>

Creating and Updating Companies
class CompaniesController < ApplicationController 
def new 
@page_title = 'Add a new company' 
@company = Company.new 
@address = Address.new 
end 
def create 
@company = Company.new(params[:company]) 
@company.address = Address.from_street_1_and_post_code(params[ :address]) 
# @company.address might be nil, 
# so set a sensible default if it is 
@address = @company.address || Address.new 
if @company.save
redirect_to_index 'Company added successfully' 
else 
@page_title = 'Add a new company' 
render :action => :new 
end 
end 
def edit 
@company = Company.find(params[:id]) 
@page_title = 'Editing ' + @company.name 
@address = @company.address 
end 
def update 
@company = Company.find(params[:id]) 
@company.address = Address.from_street_1_and_post_code(params[ :address]) 
@address = @company.address || Address.new 
if @company.update_attributes(params[:company]) 
redirect_to_index 'Person updated successfully' 
else 
@page_title = 'Editing ' + @company.name 
render :action => 'edit' 
end 
end
end

<h1><%= @page_title %></h1>
<p>Required fields are marked with &quot;*&quot;.</p> 
<% if @company.errors[:address] -%>
<p><%= error_message_on :company, :address %></p>
<% end -%> 
<p><%= label :company, 'Company name', :field_name => 'name', 
:required => true %><br />
<%= f.text_field :name %>
<%= error_message_on :company, :name %></p>
<p><%= label :company, 'Telephone' %><br />
<%= f.text_field :telephone %></p>
<p><%= label :company, 'Fax' %><br />

<%= f.text_field :fax %></p>
<p><%= label :company, 'Website' %><br />
<%= f.text_field :website %></p> 
<h2>Address*</h2>
<div id="address">
<h3>Enter address details</h3>
<%= render :partial => 'addresses/form', :locals => {:address => @address} %>
</div>
<p><%= submit_tag 'Save' %> | <%= link_to 'Cancel', :action => 'index' %></p>

Adding a Callback to Company Deletions
class Company < ActiveRecord::Base 
# ... validation methods etc. ... 
def after_destroy 
unless address_id.blank? 
address = Address.find address_id 
if address.people.empty? and address.company.nil? 
address.destroy 
end 
end 
end
end

class AddressOwnerObserver < ActiveRecord::Observer 
observe Person, Company 
def after_destroy(record) 
unless record.address_id.blank? 
address = Address.find address_id 
if address.people.empty? and address.company.nil? 
address.destroy 
end 
end 
end
end

Rails::Initializer.run do |config| 
# ... other settings ... 
# Activate observers that should always be running 
config.active_record.observers = :address_owner_observer 
# ... yet more settings ...
End

$ script/console
Loading development environment.
>> a = Address.new(:street_1 => '78 Blink Street', 
:post_code => 'B14 2QQ')
=> #<Address:0xb75c7b0c ...}>
>> a.save # Save the address to the database 
=> true
>> c = Company.new(:name => 'Charming Pottery')
=> #<Company:0xb759ba84 ...}>
>> c.address = a # Associate the address with the company
=> #<Address:0xb75c7b0c ...>
>> c.save # Save the company to the database
=> true
>> c.address_id # ID of the address associated with the company
=> 16
>> c.destroy # The callback is triggered by this method call
=> #<Company:0xb759ba84 ...>
>> Address.find 16 # Try to retrieve the address from the database
ActiveRecord::RecordNotFound: Couldn't find Address with ID=16
...

Unit Testing for Callbacks
# Test that the after_destroy call-back for Company 
# correctly triggers deletion of an orphaned address.
def test_deletes_orphaned_address 
@acme.destroy 
assert_raise(ActiveRecord::RecordNotFound) { Address.find 1 }
end



