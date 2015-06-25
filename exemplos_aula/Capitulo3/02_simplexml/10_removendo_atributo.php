<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );

// atributos
$atributos = $obj->apostila[0]->attributes();

// removendo atributo
unset( $atributos->versao );

// gerando o xml novamente
echo $obj->asXML();