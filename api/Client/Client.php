<?php

try
{
    $input    = isset($_POST['input']) ? $_POST['input'] : "test input";

    $wsdl     = 'http://localhost/edd/api/UDDI/admin.wsdl';

    $params   = [
                  'trace'      => true,
                  'cache_wsdl' => WSDL_CACHE_NONE,
                  'features'   => SOAP_SINGLE_ELEMENT_ARRAYS
                ];

    $client   = new SoapClient($wsdl, $params);


    //Serve request
    $response = $client->Hello($input);
    echo $response;

    $trace = <<<TRACE
<br /><strong>REQUEST:</strong>  <br/>  htmlspecialchars(})  <br/>
<br /><strong>RESPONSE:</strong> <br/>  htmlspecialchars({$client->__getLastResponse()}) <br/>
TRACE;


}
catch (Exception $exception) {
    print_r($input);
  echo "Exception: {$exception->getMessage()}";
}
catch (SOAPFault $exception) {
  echo "SOAP Exception: {$exception->getMessage()}";
}
