<?php

class Bank {
    private $accounts = [];
    private $corrAccounts;
    private $bankCode;
    public function __construct($corrAccounts, $bankCode)
    {
        $this->corrAccounts = $corrAccounts;
        $this->bankCode = $bankCode;

    }
    public function createAccount( $accNumber )
    {
        $this->accounts[] = $accNumber;
    }

    public function showAccountsList()
    {
        print_r($this->accounts);
    }
}

$sberBank = new Bank('45641445646', 'sb765');
$sberBank->createAccount('123123456');
$sberBank->createAccount('123123789');
//$sberBank->showAccountsList();

$alfabank = new Bank('45641445674', 'al456');
$alfabank->createAccount('993123456');
$alfabank->createAccount('993123789');

$alfabank->showAccountsList();