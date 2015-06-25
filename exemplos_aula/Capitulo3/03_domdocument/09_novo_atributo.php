<?php
// Carregando XML de um arquivo

// criando objeto da classe DOM
$obj = new DOMDocument();
$obj->load( '00_apostilas.xml' );

// localizando 'apostila'
$apostila = $obj->getElementsByTagName('apostila');

// criando atributo 'paginas'
$apostila->item(0)->setAttribute('paginas', '165');

// gerando o xml novamente
echo $obj->saveXML();