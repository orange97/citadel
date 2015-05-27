class Submarine
  include Mongoid::Document

  has_one :vehicle, :as => :resource

  field :max_depth, type: Float
  field :is_nuclear, type: Boolean
  field :missile_capable, type: Boolean
end

