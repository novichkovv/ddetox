<?php

$host = "getyourgarcinia.com"; //our online shop url
$client = new SoapClient("https://www.drcolbert.com/api/?wsdl"); //soap handle
$apiuser= "garcinia"; //webservice user login
$apikey = "74pLaWFoVakQ"; //webservice user pass
$action = "sales_order.list"; //an action to call later (loading Sales Order List)
try { 

  $sess_id= $client->login($apiuser, $apikey); //we do login


print_r($client->call($sess_id, $action));
}
catch (Exception $e) { //while an error has occured
	echo "==> Error: ".$e->getMessage(); //we print this
	   exit();
}

?>