
class Person < ActiveRecord::Base 
EMAIL_REGEX = /^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i 
validates_format_of :email, :with => EMAIL_REGEX, 
:message => "Please supply a valid email address" 
validates_uniqueness_of :email, 
:message => "This email address already exists" 
validates_presence_of :first_name, 
:message => "Please enter a first name" 
validates_presence_of :last_name, 
:message => "Please enter a last name" 
GENDERS = {'M' => 'male', 'F' => 'female'} 
validates_inclusion_of :gender, :in => GENDERS.keys, 
:message => "Please select 'M' or 'F' for the genre" 
...
End

Validating Companies
class Company < ActiveRecord::Base 
validates_presence_of :name, 
:message => "Please enter a company name"
End

Validating Addresses
class Address < ActiveRecord::Base 
validates_presence_of :street_1, 
:message => "Please enter an initial line for the address" 
POSTCODE_REGEX = /^[A-Z][A-Z]?[0-9][A-Z0-9]? ?[0-9][ABDEFGHJLNPQRSTUWXYZ]{2}$/i 
validates_format_of :post_code, :with => POSTCODE_REGEX, 
:message => "Please enter a valid post code" 
def validate_on_create 
if Address.find_by_street_1_and_post_code(street_1, post_code) 
errors.add_to_base('Street address and post code already exist in the database') 
end 
end
end

