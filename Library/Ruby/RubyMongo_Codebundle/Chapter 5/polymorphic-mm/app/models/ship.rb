class Ship
  include MongoMapper::Document

  one :vehicle, :as => :resource

end

