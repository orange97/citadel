class BookDetail
  include MongoMapper::Document

  key :page_count, Integer
  key :price,      Float
  key :binding,    String
  key :isbn,       String

  belongs_to :book

end
