In the Company class, we add belongs_to:
class Company < ActiveRecord::Base 
belongs_to :address 
...
end
In the Address class, we add has_one:
class Address < ActiveRecord::Base 
has_one :company 
...
End

>> comp = Company.find :first # find a company
=> #<Company:0xb7432888 ...>
>> addr = Address.find :first # find an address
=> #<Address:0xb7430150 ...>
>> comp.address = addr # assign the address to the company
=> #<Address:0xb7430150 ...>
>> comp.save # save the company
=> true
>> comp.address # retrieve the address for a company
=> #<Address:0xb7430150 ...>
>> addr.company # retrieve the company associated with an address
=> #<Company:0xb7427f00 ...>

Validating a Company's Address
class Company < ActiveRecord::Base 
has_many :people 
belongs_to :address 
validates_presence_of :name, 
:message => "Please enter a company name" 
validates_presence_of :address, 
:message => 'Address must be supplied' 
validates_associated :address, 
:message => 'Address is invalid'
End


