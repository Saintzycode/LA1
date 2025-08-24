<?php
class Bank {
    public $accountNumber;
    public $accountOwnerName;
    public $balance;
    public $userId;
    public $pin;

    public function __construct() {
        $this->accountOwnerName = "GP.Tano";
        $this->accountNumber = "12345678901";
        $this->balance = 10000;
        $this->userId = "GeorgePTanoID";
        $this->pin = "8788";
    }


    public function showAccountOwnerName() {
        echo "Account Owner Name: {$this->accountOwnerName}\n";
    }
    public function showBalance() {
        echo "Balance: {$this->balance}\n";
    }

    public function withdraw($amount) {
        $tries = 0;
        while ($tries < 3) {
            echo "Enter PIN: ";
            $inputPin = trim(fgets(STDIN));
            if ($inputPin === $this->pin) {
                if ($amount > $this->balance) {
                    echo "Insufficient funds.\n";
                    return false;
                }
                $this->balance -= $amount;
                echo "Withdraw: $amount\n";
                return true;
            } else {
                $tries++;
                if ($tries < 3) {
                    echo "Incorrect pin. Try again.\n";
                } else {
                    echo "Incorrect pin. Maximum attempts reached. Withdrawal cancelled.\n";
                }
            }
        }
    }

    public function deposit($amount) {
        $this->balance += $amount;
        echo "Deposit: $amount\n";
    }

    public function updateOwnerName($newName) { 
        $tries = 0;
        while ($tries < 3) {
            echo "Enter PIN to update owner name: ";
            $inputPin = trim(fgets(STDIN));
            if ($inputPin === $this->pin) {
                $this->accountOwnerName = $newName;
                echo "Owner name updated.\n";
                return true;
            } else {
                $tries++;
                if ($tries < 3) {
                    echo "Incorrect pin. Try again.\n";
                } else {
                    echo "Incorrect pin. Maximum attempts reached. Update cancelled.\n";
                }
            }
        }
        return false;
    }

    public function changePin($newPin) {
        $this->pin = $newPin;
        echo "Pin changed.\n";
    }

}
$bank = new Bank();
$bank->showBalance();
$bank->showAccountOwnerName();
$bank->withdraw(10000);
$bank->deposit(1000);
$bank->withdraw(500);
$bank->showBalance();
$bank->updateOwnerName("Georgio P. Tano");
$bank->changePin("8878");
$bank->showAccountOwnerName();
$bank->withdraw(1000);
$bank->withdraw(1000);
$bank->showBalance();
