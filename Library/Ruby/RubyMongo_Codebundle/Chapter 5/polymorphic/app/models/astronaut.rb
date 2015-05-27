class Astronaut < AeroSpace
  embeds_many :insurances, as: :insurable
end

