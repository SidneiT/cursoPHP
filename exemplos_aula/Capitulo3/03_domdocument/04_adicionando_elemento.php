<?php
// Carregando XML de um arquivo

// criando objeto da classe DOM
$obj = new DOMDocument();
$obj->load( '00_apostilas.xml' );

// adicionando elemento 'apostila'
$apostila = $obj->createElement('apostila');

// criando elemento 'titulo' em 'apostila'
$titulo = $obj->createElement('titulo', 'Nova Apostila');
$apostila->appendChild( $titulo );

// localizando 'apostilas'
$apostilas = $obj->getElementsByTagName('apostilas');

// acrestando a nova apostila no documento
$apostilas->item(0)->appendChild( $apostila );

// gerando o xml novamente
echo $obj->saveXML();