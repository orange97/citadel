class Driver
  include MongoMapper::Document

  key :name, String
  key :age, Integer
  key :address, String
  key :weight, Float

  one :address
  many :bank_accounts

  def left
    turn(270)
  end

  def right
    turn(90)
  end
  
  def turn(degrees)
    raise NotImplementedError.new
  end

  def accelerate
  end

  def brake
  end

  def refuel
  end
end

