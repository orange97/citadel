
class Company < ActiveRecord::Base 
has_many :people 
...
End

Person class with:
class Person < ActiveRecord::Base 
belongs_to :company 
# ... other methods ...
End

Validating a Person's Company
class Person < ActiveRecord::Base 
# ... other methods ... 
validates_associated :company
end

Many-to-many relationships
class Categories < ActiveRecord::Base 
has_and_belongs_to_many :companies 
...
end
class Companies < ActiveRecord::Base 
has_and_belongs_to_many :categories 
...
End

