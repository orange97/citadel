class Book
  include Mongoid::Document

  field :title, type: String
  field :publisher, type: String
  field :published_on, type: Date

  field :votes, type: Array 

  belongs_to :author
  has_and_belongs_to_many :categories
  has_one :book_detail

  embeds_many :reviews
end
