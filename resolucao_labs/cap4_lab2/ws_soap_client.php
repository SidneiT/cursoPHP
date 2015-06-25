<?php
$client_soap = new SoapClient( "http://dexter_completo/wsdl/Encomendas.wsdl" );

echo $client_soap->consultarEncomenda(1);