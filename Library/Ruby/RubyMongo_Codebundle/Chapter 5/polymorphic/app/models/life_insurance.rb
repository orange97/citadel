class LifeInsurance
  include Mongoid::Document

  embeds_one :insurance, as: insurable
end
