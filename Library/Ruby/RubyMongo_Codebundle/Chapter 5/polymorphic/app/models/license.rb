class License
  include Mongoid::Document

  embedded_in :driver
end
