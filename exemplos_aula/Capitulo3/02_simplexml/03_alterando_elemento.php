<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );


// Alterando o título da apostila
$obj->apostila[0]->titulo = 'Fundamentos da linguagem PHP';

// gerando o xml novamente
echo $obj->asXML();