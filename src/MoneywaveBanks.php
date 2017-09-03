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

 class MoneywaveBanks extends Moneywave
 {
    public function getBanks()
    {
       
        $moneywave = new Moneywave;
        $initreq = $moneywave->initRequest();
        $url  = $this->baseurl . "banks/";
        $request = $this->client->request('POST',$url,$initreq);
        $response = json_decode($request->getBody()->getContents(), true);
        dd($response);
        return $response;
       
    //     catch (\GuzzleHttp\Exception\RequestException $e) {
            
    //     if ($e->hasResponse()) {
    //         return json_decode($e->getResponse()->getBody()->getContents(), true);
    //     }

    //     $error = ["status" => "error",
    //         "message" => "Cannot check bank at this time, please try again",
    //         "code" => "INVALID_RESPONSE"];

    //     return $error;

    // }
    }
 }