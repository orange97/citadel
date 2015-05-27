class BankAccount
  include Mongoid::Document

  field :account_number, type: String
  field :balance, type: Float

  embedded_in :driver
end
