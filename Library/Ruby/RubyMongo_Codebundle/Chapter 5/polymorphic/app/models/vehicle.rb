class Vehicle
  include Mongoid::Document

  belongs_to :resource, :polymorphic => true

  field :terrain, type: String
  field :cost, type: Float
  field :weight, type: Float
  field :max_speed, type: Float
end
