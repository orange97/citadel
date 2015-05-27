class Ship
  include Mongoid::Document

  has_one :vehicle, :as => :resource

  field :is_military, type: Boolean
  field :is_cruise, type: Boolean
  field :missile_capable, type: Boolean
  field :anti_aircraft, type: Boolean
  field :number_engines, type: Integer
end
