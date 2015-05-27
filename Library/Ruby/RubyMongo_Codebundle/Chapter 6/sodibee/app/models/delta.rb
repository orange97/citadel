class Delta
  include Mongoid::Document
  include Mongoid::Versioning

  field :name, type: String
end
