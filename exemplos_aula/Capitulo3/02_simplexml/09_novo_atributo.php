<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );

// atributos
$atributos = $obj->apostila[0]->attributes();

// adicionando atributo
$atributos->addAttribute('paginas', '100');

// gerando o xml novamente
echo $obj->asXML();