class Bike
  include MongoMapper::Document

  one :vehicle, :as => :resource

  key :gears, Integer
  key :has_handle, Boolean
  key :cc, Float
end

