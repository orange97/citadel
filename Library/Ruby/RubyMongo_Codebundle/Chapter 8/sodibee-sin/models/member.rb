class Member
  include Mongoid::Document

  field :name, type: String
  field :phone, type: String
  field :email, type: String
  
  has_one :address, as: :location
end
