
class Person < ActiveRecord::Base 
EMAIL_REGEX = /^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i 
validates_format_of :email, :with => EMAIL_REGEX, 
:message => "Please supply a valid email address" 
validates_uniqueness_of :email, :message => "This email address 
already exists" 
...
End

>> p = Person.new(:first_name => 'William', :last_name => 'Shakes', :email => 'w.shakes@example.com')
=> #<Person:0xb790f4e0 ...>
>> p.save
=> true

>> p = Person.new(:first_name => 'Bill', :last_name => 'Shakes', :email => 'w.shakes@example.com')
=> #<Person:0xb790f4e0 ...>
>> p.save
=> false

SELECT * FROM people WHERE (people.email = 'w.shakes@example.com') LIMIT 1
