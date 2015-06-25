<?php
// Carregando XML de um arquivo

// criando objeto da classe DOM
$obj = new DOMDocument();
$obj->load( '00_apostilas.xml' );

// localizando 'apostila'
$apostila = $obj->getElementsByTagName('apostila');

// acrestando a nova apostila no documento
$apostila->item(0)->parentNode->removeChild( $apostila->item(0) );

// gerando o xml novamente
echo $obj->saveXML();