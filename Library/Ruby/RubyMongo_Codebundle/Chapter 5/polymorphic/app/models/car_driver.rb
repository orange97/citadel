class CarDriver < Terrestrial

  embeds_many :insurance, as: :insurable

  def reverse
  end
end

