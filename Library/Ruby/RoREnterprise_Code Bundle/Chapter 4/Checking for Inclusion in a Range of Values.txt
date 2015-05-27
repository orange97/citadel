
class Person < ActiveRecord::Base 
GENDERS = {'M' => 'male', 'F' => 'female'} 
...
End
class Person < ActiveRecord::Base 
GENDERS = {'M' => 'male', 'F' => 'female'} 
validates_inclusion_of :gender, :in => GENDERS.keys, 
:message => "Please select 'M' or 'F' for gender" 
...
End

>> p = Person.new
=> #<Person:0xb74ecafc ...>
>> p.gender = 'X'
=> "X"
>> p.save
=> false
>> p.errors
=> #<ActiveRecord::Errors:0xb74e83bc @errors={"gender"=>["Please select 'M' or 'F' for the genre"], ...} ...>
>> p.gender = 'M'
=> "M"
>> p.save
=> true
