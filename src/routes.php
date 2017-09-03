<?php
use Adewagold\Moneywave\MoneywaveBanks;


Route::get('/moneywave', function(){
    $moneywave = new MoneywaveBanks;
    $moneywave->getBanks();

	echo 'Hello from the moneywave package!';
});