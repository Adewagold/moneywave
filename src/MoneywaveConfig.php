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
use GuzzleHttp\Client;

class MoneywaveConfig
{
protected $baseurl;
protected $environment;
protected $apikey;
protected $apisecret;
protected $client;
public static $jsonHeader = array(
    'content-type' => 'application/json'
);

    public function __construct()
    {
        $apikey = '';
        $apisecret='';
        $baseurl='';

        $this->client = new Client();
        $this->apikey = $apikey ? : getenv('MONEYWAVE_APIKEY');  
        $this->apisecret = $apisecret ? : getenv('MONEYWAVE_SECRET');
        $env = $this->setEnvironment($this->environment);

        if ($env =='production')
        {
            $this->baseurl = 'https://live.moneywaveapi.co/';
        }
        else
        {
            $this->baseurl = 'https://moneywave.herokuapp.com/';
        }

    }

    public function setEnvironment($env)
    {
        $env = getenv('MONEYWAVE_ENV');
        return $env;
    }

    public function getAuthorizetoken()
    {
      // $client =  new Client;
       $data = json_encode(['apiKey'=>$this->apikey,'secret'=>$this->apisecret]);      
       $url = $this->baseurl . "v1/merchant/verify";
      // $body = ["apiKey" => $this->apikey, "secret" => $this->apisecret];
       $options = ["headers" => self::$jsonHeader, "body" => $data];
       $request = $this->client->request("POST", $url, $options);
       // $request->
       $response = json_decode($request->getBody()->getContents(), true);
       if ($response["status"] == "success") {
           return $response["token"];
       }

       return false;
    }



}