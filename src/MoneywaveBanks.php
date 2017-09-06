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
        return $response;
       
   
    }
 }