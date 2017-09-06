<?php 
/*
 * This file is part of the Laravel Moneywave package.
 *
 * (c) Adewale Adeleye <adewagold@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 namespace Adewagold\Moneywave;
 use Adewagold\Moneywave\Moneywave;
 


class AccountToAccountTransaction
{
    public $firstname;
    public $lastname;
    public $cardnumber;
    public $phoneno="+2348067413041";
    public $email;
    public $recipientbank = '011'; // Bank Code. Check MoneywaveBank to check the bank codes
    public $recipientaccount=''; // Bank Account Number
    public $cvv;
    public $pin;
    public $expiryyear;
    public $expirymonth;
    public $amount;
    public $narration;
    public $fee='0';
    public $redirecturl = "http://localhost:8005/successful";
    public $medium ='web';

}