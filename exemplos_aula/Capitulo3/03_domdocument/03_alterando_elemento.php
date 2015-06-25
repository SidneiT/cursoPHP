<?php
// Carregando XML de um arquivo

// criando objeto da classe DOM
$obj = new DOMDocument();
$obj->load( '00_apostilas.xml' );

// localizando elemento titulo
$apostila = $obj->getElementsByTagName('titulo');

// alterando o valor do título
$apostila->item(0)->nodeValue = 'Novo Titulo';

// gerando o xml novamente
echo $obj->saveXML();