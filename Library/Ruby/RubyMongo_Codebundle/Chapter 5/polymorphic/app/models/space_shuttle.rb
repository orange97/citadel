class SpaceShuttle
  include Mongoid::Document

  has_one :vehicle, :as => :resource

  field :boosters, type: Integer
  field :launch_location, type: String   
end

