require 'mongo'

conn = Mongo::Connection.new
db = conn['sodibee_development']
coll = db['books']

puts coll.class

puts coll.find.first.inspect
