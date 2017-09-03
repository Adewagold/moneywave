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

class CardToBank extends Moneywave
{

    public $firstname;
    public $lastname;
    public $cardnumber;
    public $phoneno="+2348067413041";
    public $email;
    public $recipientbank = '011';
    public $recipientaccount='3040981690';
    public $cvv;
    public $pin;
    public $expiryyear;
    public $expirymonth;
    public $amount;
    public $narration;
    public $fee='0';
    public $redirecturl = "http://localhost:8005/successful";
    public $medium ='web';

    public function __construct()
    {
        $this->firstname = request()->firstname;
        $this->lastname = request()->lastname;
        $this->email = request()->email;
        $this->phoneno = request()->phoneno;
        $this->recipientbank = request()->recipientbank;
        $this->recipientaccount='3040981690';
        $this->amount = intval(request()->amount);
        $this->redirecturl = request()->redirecturl;
    }

    public function initializeTransaction()
    {
        try
        {
            $url = $this->baseurl. "v1/transfer";
            
            $moneywave = new Moneywave;
             $initreq = $moneywave->initRequest();

                
        $data = [
            "firstname"=>$this->firstname,
            "lastname"=>$this->lastname,
            "email"=>$this->email,
            "phonenumber"=>$this->phoneno,
            "recipient_bank"=>$this->recipientbank,
            "recipient_account_number"=>$this->recipientaccount,
            "card_no"=>$this->cardnumber,
            "cvv"=>$this->cvv,
            "pin"=>$this->pin, //optional required when using VERVE card
            "expiry_year"=>$this->expiryyear,
            "expiry_month"=>$this->expirymonth,
            //"charge_auth"=>"PIN", //optional required where card is a local Mastercard
            "apiKey" =>$this->key,
            "amount" =>$this->amount,
            "narration"=>$this->narration, //Optional
            "fee"=>$this->fee,
            "medium"=>$this->medium,
            "redirect_url"=>$this->redirecturl
        ];
              $body = json_encode($data);
            $headers = ['content-type' => 'application/json', "Authorization" => $moneywave->getAuthorizetoken(), "exceptions" => FALSE];
             $options = ["headers" => $headers, 'body'=>$body];
             $request = $this->client->request('POST', $url, $options);
            $response = json_decode($request->getBody()->getContents(), true);
             return $response;
        }
        catch (\GuzzleHttp\Exception\RequestException $e) {
            
        if ($e->hasResponse()) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        $error = ["status" => "error",
            "message" => "There was an error in completing payment, please try again",
            "code" => "INVALID_RESPONSE"];

        return $error;
    }

        
    }
}