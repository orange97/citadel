# This file is used by Rack-based servers to start the application.

require 'sinatra'
require 'mongoid'

require File.expand_path('app')

Dir["./models/*.rb"].each do |file|
  require "./models/#{File.basename(file, '.rb')}"
end

run Sinatra::Application
