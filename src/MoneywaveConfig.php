<?php 
/*
 * This file is part of the Laravel Moneywave package.
 *
 * (c) Adewale Adeleye <adewagold@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
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
        $this->apikey = env('MONEYWAVE_APIKEY') ?: $apikey ;  
        $this->apisecret = env('MONEYWAVE_SECRET')?:$apisecret;
        
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
      $config = new MoneywaveConfig;
       $data = json_encode(['apiKey'=>$config->apikey,'secret'=>$config->apisecret]);      
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

/*
 $this->client =  new Client();
        $this->baseurl = 'https://live.moneywaveapi.co/'; //'https://moneywave.herokuapp.com/';
        $this->key ='lv_MR5THKS4ZAW2G1ENK8D2';//'ts_OKDKSBUMD4ZCRT5YU8NR';
        $this->secret = 'lv_VZ5I8J4BKM8W33GBDZ630TV6L0KVYN';//'ts_2EANBLDL72ZLC2WV4G78AWASF5G04U';

        */