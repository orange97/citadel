##
# This document is embedded in Book
#
class Review 
  include Mongoid::Document

  # @return [String] The review comment
  field :comment, type: String

  # @return [String] The user who reviewed the book
  field :username, type: String

  # @return [Book] The book that embeds this review
  embedded_in :book
end
