<?php
use Adewagold\Moneywave\MoneywaveConfig;


Route::get('/moneywave', function(){
    $moneywave = new MoneywaveConfig;
    $moneywave->getAuthorizetoken();
	echo 'Hello from the moneywave package!';
});