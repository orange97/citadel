class Author
  include Mongoid::Document

  field :name, type: String

  has_many :books, order: { :title => 1 }

# NOTE: You can use any ONE of the following only relations for Following
# and Followers

=begin # Option 1: Inverse_of relations for following & followers
  has_and_belongs_to_many :followers, 
                          class_name: "Author",
                          inverse_of: :following

  has_and_belongs_to_many :following, 
                         class_name: "Author",
                         inverse_of: :followers
=end

=begin # Option 2: Cyclic relationship for following & followers
  embeds_many :child_authors, class_name: "Author", cyclic: true
  embedded_in :parent_author, class_name: "Author", cyclic: true
=end

  # Option 3: Shorthand for cyclic relationship
  recursively_embeds_many
end
