# The class defines the author!
class Author
  include Mongoid::Document

  field :name, type: String

  validates_presence_of :name

  has_one :address, as: :location, autosave: true, dependent: :destroy
  has_many :books, autosave: true, dependent: :destroy

  accepts_nested_attributes_for :books, :address, allow_destroy: true
end
