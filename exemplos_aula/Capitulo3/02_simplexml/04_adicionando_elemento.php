<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );

// criando novo elemento
$nova_apostila = $obj->addChild( 'apostila');

// adicionando um novo elemento
$nova_apostila->addChild( 'titulo', 'Desenvolvimento OO com PHP') ;

// gerando o xml novamente
echo $obj->asXML();