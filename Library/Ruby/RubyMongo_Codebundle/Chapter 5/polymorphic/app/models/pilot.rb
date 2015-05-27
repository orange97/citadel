class Pilot < AeroSpace
  embeds_many :insurances, as: :insurable

  def eject
  end
end

