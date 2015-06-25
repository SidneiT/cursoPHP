<?php
// Carregando XML de um arquivo

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( '00_apostilas.xml', null, true );

// imprimindo saida
echo '<pre>';
print_r( $obj );