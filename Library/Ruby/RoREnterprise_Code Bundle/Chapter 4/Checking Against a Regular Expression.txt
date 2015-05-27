
class Person < ActiveRecord::Base 
EMAIL_REGEX = /^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i 
validates_format_of :email, :with => EMAIL_REGEX, 
:message => "Please supply a valid email address" 
...
End

>> p = Person.new(:first_name => 'Elliot', :last_name => 'Smith')
=> #<Person:0xb742dbec ...>
>> p.email = 'elliot at example.com'
=> "elliot at example.com"
>> p.save
=> false
>> p.errors['email']
=> "Please supply a valid email address"
>> p.email = 'elliot@example.com'
=> "elliot@example.com"
>> p.save
=> true
