class Address
  include Mongoid::Document
  include Geocoder::Model::Mongoid 
  include Mongoid::Spacial::Document 

  field :street, type: String
  field :zip, type: Integer
  field :city, type: String
  field :state, type: String
  field :country, type: String

  field :coordinates, type: Array

  belongs_to :location, polymorphic: true

  #index [[ :coordinates, Mongo::GEO2D ]] # default: min: -180, max: 180
  spacial_index :coordinates 

  geocoded_by :formatted_addr
  after_validation :geocode 

  def formatted_addr
    [street, city, state, country].join(',') 
  end
end
