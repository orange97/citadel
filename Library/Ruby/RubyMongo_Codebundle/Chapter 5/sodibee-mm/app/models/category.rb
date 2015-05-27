class Category
  include MongoMapper::Document

  key :name, String
  key :book_ids, Array

  many :books, :in => :book_ids

end
