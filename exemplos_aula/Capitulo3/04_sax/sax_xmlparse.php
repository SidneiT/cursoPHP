<?php
echo '<pre>';
$apostilas = array();
$elemento  = null;

/**
 * Definindo as Funcoes para tratamento dos eventos
 */

function elementoInicial($parser, $nome, $atributos) {
	global $apostilas, $elemento;

	if($nome == 'APOSTILA') {
		$apostila = array();

		foreach( $atributos as $atributo => $valor ) {
			$apostila['atributos'][$atributo] = $valor;
		}

		$apostilas[] = $apostila;
	}

	$elemento = $nome;
}

function elementoFinal($parser, $nome) {
	global $elemento;

	$elemento = null;
}

function texto($parser, $texto){
	global $apostilas, $elemento;

	if( $elemento == 'TITULO' ) {
		$ultima_apostila = count( $apostilas ) - 1;
		$apostilas[ $ultima_apostila ][ $elemento ] = $texto;
	}
}

/**
 * Criando parser
 */

$parser = xml_parser_create();

xml_set_element_handler($parser,'elementoInicial', 'elementoFinal');

xml_set_character_data_handler($parser, 'texto');

/**
 * SAX
 */

$arquivo = fopen('apostilas.xml', 'r');

while($dados = fread($arquivo, 30)) {
	//echo "$dados \n";
	
	xml_parse($parser, $dados);
}

xml_parser_free($parser);

/**
 * Exibindo resultado
 */
print_r( $apostilas );