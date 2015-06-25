<?php
// Carregando XML de um arquivo

// criando objeto da classe DOM
$obj = new DOMDocument();
$obj->load( '00_apostilas.xml' );

// localizando 'apostila'
$apostila = $obj->getElementsByTagName('apostila');

// alterando atributo 'versao'
$apostila->item(0)->setAttribute('versao', '2.3');

// gerando o xml novamente
echo $obj->saveXML();