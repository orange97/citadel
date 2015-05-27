
In the Person model:
class Person < ActiveRecord::Base 
belongs_to :address 
...
End
In the Address model:
class Address < ActiveRecord::Base 
has_many :people 
...
End
>> addr = Address.new(:street_1 => '44 Monty Avenue', :city => 'Molltoxeter', :post_code => 'MX12 1YH') # create an address
>> addr.save
=> true
>> pers = Person.find :first # find a person
>> pers.address = addr # assign an address to the person
>> pers.save
=> true
>> pers = Person.find :first # find a person
=> #<Person:0xb74a4228 ...>
>> pers.address # retrieve the address for the person
=> #<Address:0xb74a2504 @attributes={"city"=>"Molltoxeter", "updated_at"=>"2006-11-03 14:33:20", "county"=>nil, "street_1"=>"44 Monty Avenue", "street_2"=>nil, "post_code"=>"MX12 1YH", "street_3"=>nil, "id"=>"5", "created_at"=>"2006-11-03 14:33:20"}>
>> a = Address.find :first # find an address
>> a.people # find the people associated with the address
=> [#<Person:0xb744a5c8 ...>, #<Person:0xb744a58c ...>]

