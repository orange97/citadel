class Car
  include MongoMapper::Document

  one :vehicle, :as => :resource

  key :windows
  key :seating
end
