<?php

$entrada = "A cada casa temos nada!";

// funcao: preg_match
// verifica se determinada expressão conseguiu validar uma
// string de entrada

var_dump( preg_match("/...a/", $entrada) );
// Obs: ponto (.) significa qualquer caracter

echo '<hr>';

var_dump( preg_match("/...c/", $entrada) );

echo '<hr>';

var_dump( preg_match("/...w/", $entrada) );


echo '<hr><br><br>';

echo "$entrada <br><br>";

// funcao: preg_match_all
// semelhante a anterior, porém retornar todas as
// ocorrencias que a expressao encontrou na string entrada

preg_match_all( "/...a/", $entrada, $retorno );

print_r( $retorno );

echo '<hr><br><br>';

// funcao: preg_replace
// permite substituir trechos de uma string baseando em uma
// expressao regular

echo "$entrada <br><br>";

$alterada = preg_replace("/...a/", "???A", $entrada);

echo "$alterada <hr><br><br>";


// funcao: preg_split
// semelhante a explode, porém utilizamos uma expressa 
// regular para transformar a string em array

echo "$entrada <br><br>";

$array_saida = preg_split("/(^(.a.a))/", $entrada);

print_r($array_saida);


echo "<hr><br><br>";


$array = array( '012', 'dfdf', '232', '2323', '33' );

$novo_array = preg_grep( "/^[\d]{3}$/", $array );

print_r( $novo_array );