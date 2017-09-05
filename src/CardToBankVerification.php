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

class CardToBankVerification extends Moneywave
{

   
    public $transactionref;
    public $otp ;
    
    public function __construct()
    {
        $this->transactionref = request()->transactionref;
        $this->otp = request()->otp;
        
    }

    public function validateCard()
    {
        try
        {
            $url = $this->baseurl. "v1/transfer/charge/auth/card";
            
            $moneywave = new Moneywave;
             $initreq = $moneywave->initRequest();

                
        $data = [
            "transactionref"=>$this->transactionref,
            "otp"=>$this->otp
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
            "message" => "Cannot Validate Payment",
            "code" => "INVALID_RESPONSE"];

        return $error;
    }

        
    }
}