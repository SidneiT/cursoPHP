<?php
// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( 'apostilas.xml', null, true );

// consultando curso com codigo 500
$curso500 = $obj->xpath("/apostilas/apostila[@codigo=500]");

// exibindo resultado
echo '<pre>';
print_r($curso500);