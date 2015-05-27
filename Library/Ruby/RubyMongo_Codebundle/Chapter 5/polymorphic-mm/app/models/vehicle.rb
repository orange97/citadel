class Vehicle
  include MongoMapper::Document

  belongs_to :resource, :polymorphic => true

  key :terrain, String
  key :cost, Float
  key :weight, Float
end
