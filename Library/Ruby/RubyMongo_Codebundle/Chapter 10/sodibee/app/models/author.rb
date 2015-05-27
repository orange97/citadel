class Author
  include Mongoid::Document

  field :name, type: String

  validates_presence_of :name

  has_one :address, as: :location, autosave: true, dependent: :destroy
  has_many :books, autosave: true, dependent: :destroy

  accepts_nested_attributes_for :books, :address, allow_destroy: true

  index :name
  shard_key :name

  def self.statistics
    map = %q{function() {
            emit(this.name.toLowerCase()[0], {count:1});
          }
    }

    reduce = %q{ function(key, values) {
               var r = { count: 0 };
               values.forEach(function(value) {
                 r.count += value.count;
               });
               return r;
             }
    }
    res = Author.collection.map_reduce(map, reduce, out: "author_stats")
  end

  def self.statistics_depr
    matches = {}
    Author.all.each do | a|
      key = a.name.downcase.first
      matches[key] = matches[key].to_i + 1
    end
    matches
  end

  
end
