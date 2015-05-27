
class Person < ActiveRecord::Base 
belongs_to :company 
belongs_to :address 
validates_associated :address 
...
End

