class Aeroplane
  include Mongoid::Document

  has_one :vehicle, :as => :resource

  field :seating, type: Integer
  field :max_altitude, type: Integer
  field :wing_span, type: Float
end

