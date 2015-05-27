class Bike
  include Mongoid::Document

  has_one :vehicle, :as => :resource

  field :gears, type: Integer
  field :has_handle, type: Boolean
  field :cubic_capacity, type: Float
end

