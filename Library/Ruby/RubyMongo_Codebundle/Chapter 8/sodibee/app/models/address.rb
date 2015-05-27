class Address
  include Mongoid::Document

  field :street, type: String
  field :zip, type: Integer
  field :city, type: String
  field :state, type: String
  field :country, type: String

  field :coordinates, type: Array

  belongs_to :location, polymorphic: true

end
