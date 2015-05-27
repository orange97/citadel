class Submarine
  include MongoMapper::Document

  one :vehicle, :as => :resource
end

