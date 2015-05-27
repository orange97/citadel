##
# This class defines the categories of books.

class Category
  include Mongoid::Document

  # @return [String] The category name
  field :name, type: String

  # @return [Array] This is an array of Book objects.
  #                 These are all the books that belong to this category.
  has_and_belongs_to_many :books
end
