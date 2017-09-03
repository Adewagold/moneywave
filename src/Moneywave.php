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

use Adewagold\Moneywave\MoneywaveConfig;
use GuzzleHttp\Client;

class Moneywave extends MoneywaveConfig
{
    protected $client;
    protected $baseurl;
    protected $config;
    

    public function __construct()
    {
        $this->client =  new Client();
        $this->config = new MoneywaveConfig;
        $this->baseurl = $this->config->baseurl;
       
        
    }

    public function initRequest() {
        // $body = ["apiKey" => $this->apiKey, "secret" => $this->apiSecret];
        $headers = ['content-type' => 'application/json', "Authorization" => $this->config->getAuthorizetoken(), "exceptions" => FALSE, "Cache-Control"=> "no-cache"];
        $options = ["headers" => $headers];
        return $options;
    } 

    

}