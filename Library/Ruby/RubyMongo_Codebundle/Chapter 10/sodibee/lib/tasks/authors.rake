require 'faker'
task :fake_authors => :environment do
  10000.times do
    a = Author.create(:name => "#{Faker::Name.first_name} #{Faker::Name.last_name}")
  end
end
