class Address
  include MongoMapper::EmbeddedDocument

  key :street, String
  key :city, String

  embedded_in :driver
end
