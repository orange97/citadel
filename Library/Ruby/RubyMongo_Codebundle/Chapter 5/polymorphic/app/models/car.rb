class Car
  include Mongoid::Document

  has_one :vehicle, :as => :resource

  field :windows, type: Integer
  field :seating, type: Integer
  field :bhp, type: Float
end

