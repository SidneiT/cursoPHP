<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );

// atributos
$atributos = $obj->apostila[0]->attributes();

// alterando atributo
$atributos->versao = '2.0';

// gerando o xml novamente
echo $obj->asXML();