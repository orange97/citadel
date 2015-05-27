class BankAccount
  include MongoMapper::EmbeddedDocument

  key :account_number, String
  key :balance, Float

  embedded_in :driver
end
