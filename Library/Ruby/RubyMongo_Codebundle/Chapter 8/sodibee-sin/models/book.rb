##
# This class defines the details of a Book.
#

class Book
  include Mongoid::Document

  # @return [String] The title of the book
  field :title, type: String

  # @return [String] The publisher of the book
  field :publisher, type: String

  # @return [String] The date the book is published on
  field :published_on, type: Date

  # @return [String] The price of the book is a localized string
  #         Depending on the locale, the prices are updated as
  #         per their currency rate.
  field :price, localize: true

  # @return [Array] An array of votes in the format that we can identify 
  #         upvotes and downvotes! Hence each element of the array
  #         is an hash in a fixed format.
  #          { 'name' => 1 }  # => upvote 
  #          { 'name' => -1 } # => downvote
  field :votes, type: Array 

  # @return [Author] This is the author of the book.
  belongs_to :author

  # @return [Array] The array of Category objects.
  #                 These are the categories that this book belongs to.
  has_and_belongs_to_many :categories

  # @return [Array] This returns the array of all embedded reviews.
  embeds_many :reviews

  validates :title, presence: true

end
