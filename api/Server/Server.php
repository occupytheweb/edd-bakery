<?php

header("Cache-Control: no-cache");
header("Pragma: no-cache");

require_once('AdminInterface.class.php');

ini_set("soap.wsdl_cache_enabled", "0");

$server = new SoapServer('http://localhost/edd/api/UDDI/admin.wsdl');

$server->setClass('AdminInterface');
$server->setPersistence(SOAP_PERSISTENCE_REQUEST);

$server->handle();
