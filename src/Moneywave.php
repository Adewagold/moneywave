<?php 

namespace Adewagold\Moneywave;

use Adewagold\Moneywave\MoneywaveConfig;
use GuzzleHttp\Client;

class Moneywave extends MoneywaveConfig
{
    protected $client;

    public function __construct()
    {
        $this->client =  new Client();
    }

    public function getRequest()
    {
        
    }

    public function getAuthorizetoken()
    {
      // $client =  new Client;
       $data = json_encode(['apiKey'=>$this->key,'secret'=>$this->secret]);      
       $url = $this->baseurl . "v1/merchant/verify";
       $body = ["apiKey" => $this->key, "secret" => $this->secret];
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