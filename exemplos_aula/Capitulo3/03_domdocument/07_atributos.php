<?php
// Carregando XML de um arquivo

// criando objeto da classe DOM
$obj = new DOMDocument();
$obj->load( '00_apostilas.xml' );

// localizando 'apostila'
$apostila = $obj->getElementsByTagName('apostila');

// recuperando atributo 'versao'
echo $apostila->item(0)->getAttribute('versao');