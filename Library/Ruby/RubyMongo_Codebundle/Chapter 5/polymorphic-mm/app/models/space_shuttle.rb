class SpaceShuttle
  include MongoMapper::Document

  one :vehicle, :as => :resource
end

