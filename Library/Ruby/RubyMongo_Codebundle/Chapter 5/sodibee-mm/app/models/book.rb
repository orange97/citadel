class Book
  include MongoMapper::Document

  key :title,         String
  key :publisher,     String
  key :published_on,  Date

  belongs_to :author
  one :book_detail

end
