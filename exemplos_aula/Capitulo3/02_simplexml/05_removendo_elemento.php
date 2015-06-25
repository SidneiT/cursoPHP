<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );

// removendo elemento
unset( $obj->apostila[0] );

// gerando o xml novamente
echo $obj->asXML();