<?php
// Desabilitar o cache de WSDL do PHP
ini_set('soap.wsdl_cache_enabled', '0');

// criar uma instancia da classe SoapClient
$cliente = new SoapClient('http://localhost/exemplos_aula/Capitulo4/soap/wscalc.wsdl');
echo $cliente->soma(12, 4);

echo '<hr>';

echo $cliente->subtracao(12, 4);

echo '<hr>';

echo $cliente->multiplicacao(8, 7);