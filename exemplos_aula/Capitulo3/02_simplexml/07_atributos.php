<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );

// atributos
$atributos = $obj->apostila[0]->attributes();

// exibir os atributos
echo '<pre>';
print_r( $atributos );