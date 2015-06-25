<?php
// criando objeto da classe DOM
$dom = new DOMDocument();
$dom->load( 'apostilas.xml' );

// Criando um objeto da classe DOMXPath
$dom_xpath = new DOMXPath( $dom );

// consultando curso com codigo 500
$curso500 = $dom_xpath->query("/apostilas/apostila[@codigo=500]");

// exibindo resultado
echo '<pre>';
print_r($curso500);