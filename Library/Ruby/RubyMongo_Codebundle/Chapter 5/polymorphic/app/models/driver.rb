class Driver
  include Mongoid::Document

  field :name, type: String
  field :age, type: Integer
  field :address, type: String
  field :weight, type: Float

  embeds_one :address
  embeds_many :bank_accounts

  embeds_many :licenses

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

