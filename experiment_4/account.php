<?php

// Define the base class Account
class Account {
    protected $accountNumber;
    protected $balance;

    // Constructor to initialize account number and balance
    public function __construct($accountNumber, $initialBalance) {
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
    }

    // Destructor to clean up resources
    public function __destruct() {
        // Clean up operations if needed
    }

    // Function to deposit money
    public function deposit($amount) {
        $this->balance += $amount;
        echo "Deposited $amount. New balance: $this->balance<br>";
    }

    // Function to withdraw money
    public function withdraw($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            echo "Withdrawn $amount. New balance: $this->balance<br>";
        } else {
            echo "Insufficient balance<br>";
        }
    }

    // Function to get account balance
    public function getBalance() {
        return $this->balance;
    }
}

// Define a subclass SavingsAccount that extends Account
class SavingsAccount extends Account {
    private $interestRate;

    // Constructor to initialize interest rate
    public function __construct($accountNumber, $initialBalance, $interestRate) {
        parent::__construct($accountNumber, $initialBalance);
        $this->interestRate = $interestRate;
    }

    // Function to calculate and add interest
    public function addInterest() {
        $interest = $this->balance * ($this->interestRate / 100);
        $this->balance += $interest;
        echo "Interest added: $interest. New balance: $this->balance<br>";
    }
}

// Define a subclass CurrentAccount that extends Account
class CurrentAccount extends Account {
    // Function to check if balance goes below minimum allowed
    public function checkMinimumBalance() {
        if ($this->balance < 1000) {
            echo "Warning: Balance below minimum allowed<br>";
        }
    }
}

// Create objects of SavingsAccount and CurrentAccount
$savingsAccount = new SavingsAccount('SA123456', 5000, 5); // Account number, initial balance, interest rate
$currentAccount = new CurrentAccount('CA987654', 3000); // Account number, initial balance

// Perform operations on accounts
$savingsAccount->deposit(2000);
$savingsAccount->addInterest();
echo "Savings Account Balance: " . $savingsAccount->getBalance() . "<br>";

$currentAccount->withdraw(1500);
$currentAccount->checkMinimumBalance();
echo "Current Account Balance: " . $currentAccount->getBalance() . "<br>";
?>
