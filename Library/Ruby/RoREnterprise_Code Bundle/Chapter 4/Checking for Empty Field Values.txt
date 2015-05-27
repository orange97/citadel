
class Person < ActiveRecord::Base 
validates_presence_of :first_name, 
:message => "Please enter a first name" 
validates_presence_of :last_name, 
:message => "Please enter a last name" 
...
End

# validate when creating new records and updating existing records
# (this is the default)
validates_presence_of :first_name, :on => :save
# ONLY validate when creating new records 
validates_presence_of :first_name, :on => :create
# ONLY validate when updating existing records
validates_presence_of :first_name, :on => :update

>> p = Person.new
=> #<Person:0xb7436850 ...>
>> p.save
=> false
>> p.errors
#<Person:0xb7436850 @new_record=true, @errors=#<ActiveRecord::Errors:0xb74349d8 @errors={"first_name"=>["Please enter a first name"], "last_name"=>["Please enter a last name"]} ...>

>> p.errors['last_name']
=> "Please enter a last name"
>> p.errors['first_name']
=> "Please enter a first name"
