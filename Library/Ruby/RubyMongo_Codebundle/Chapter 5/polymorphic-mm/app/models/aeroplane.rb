class Aeroplane
  include MongoMapper::Document

  one :vehicle, :as => :resource
end
