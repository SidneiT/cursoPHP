<?php
// Carregando XML de uma variavel
$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<apostilas>
	<apostila versao="2.0">
		<titulo>Desenv. Enterprise PHP</titulo>
		<topicos>
			<topico>XML</topico>
			<topico>Webservice</topico>
		</topicos>
	</apostila>
</apostilas>
XML;

// criando objeto da classe SimpleXMLElement
$obj = new SimpleXMLElement( $xml );

// imprimindo saida
echo '<pre>';
print_r( $obj );