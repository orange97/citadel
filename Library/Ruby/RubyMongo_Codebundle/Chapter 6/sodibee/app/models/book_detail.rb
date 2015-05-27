class BookDetail
  include Mongoid::Document

  field :page_count, type: Integer
  field :price, type: Float
  field :binding, type: String
  field :isbn, type: String

  belongs_to :book

end

