require 'mongoid'
require 'sinatra'

configure do
  Mongoid.configure do |config|
    name = "sodibee_development"
    host = "localhost"
    config.master = Mongo::Connection.new.db(name)
    config.persist_in_safe_mode = false
  end

#set :public_folder, Proc.new { File.join(root, "public") }
  enable :sessions
end

get "/authors" do
  @authors = Author.all
  haml :'authors/index'
end

get "/authors/new" do
  @author = Author.new
  @author.build_address
  @author.books.build
  haml :'authors/new'
end

get "/author/:id/edit" do
  @author = Author.find(params[:id])
  haml :'authors/edit'
end

