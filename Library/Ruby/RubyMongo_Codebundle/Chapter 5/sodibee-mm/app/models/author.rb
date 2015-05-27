class Author
  include MongoMapper::Document

  key :name, String

  many :books
end
