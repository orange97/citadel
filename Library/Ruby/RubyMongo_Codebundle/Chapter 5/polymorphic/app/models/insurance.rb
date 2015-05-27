class Insurance
  include Mongoid::Document

  embedded_in :insurable, polymorphic: true
end
