class Review 
  include Mongoid::Document

  field :comment, type: String
  field :username, type: String
  field :views, type: Integer

  embedded_in :book

  before_save { |doc|
    doc.views = 1
  }
end
