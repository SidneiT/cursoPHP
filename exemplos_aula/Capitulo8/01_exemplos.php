<?php
/***
 * Validando uma placa de veiculo: DHC-9170
**/

$string_entrada = "DHC-9170";  #valido
//$string_entrada = " DHC-9170"; #invalido
//$string_entrada = "DH-9170";   #invalido

// 1ª forma:
//$expressao = "^[A-Z]{3}-[0-9]{4}$";
/*
 ^        -> que comece com
 [A-Z]{3} -> possua uma sequencia de 3 letras maiuscula
 -        -> possua um hifen
 [0-9]{4} -> possua uma sequencia de 4 numeros
 $        -> fim da string
 */

// 2ª forma:
//$expressao = "^[A-Z]{3}-\d{4}$";
/*
 ^        -> que comece com
 [A-Z]{3} -> possua uma sequencia de 3 letras maiuscula
 -        -> possua um hifen
 \d{4}    -> possua uma sequencia de 4 numeros
 $        -> fim da string

 OBS:
 \d = digitos de 0 a 9
 \D = que não são digitos
 */

/***
 * Fim: Validando uma placa de veiculo
 **/



/***
 * Validando telefone: (00) 0000-0000
 **/

$string_entrada = "(11) 2125-4747";

// 1ª forma
// $expressao = "^[(]{1}[\d]{2}[)]{1}\s{1}[\d]{4}-[\d]{4}$";
/*
 ^        -> que comece com
[(]{1}   -> possua uma abertura de parenteses
		[\d]{2}  -> possua uma sequencia de 2 numeros
		[)]{1}   -> possua um fechamento de parenteses
\s{1}    -> uma ocorrencia de espaço
[\d]{4}  -> possua uma sequencia de 4 numeros
-        -> um hifen
[\d]{4}  -> possua uma sequencia de 4 numeros
$        -> fim da string
*/

// 2ª forma

/*# Simulando erro (falta de caracter de escape)
 $string_entrada = "11 2125-4747";
$expressao = "^([\d]{2})\s{1}[\d]{4}-[\d]{4}$";
*/

$expressao = "^\([\d]{2}\)\s{1}[\d]{4}-[\d]{4}$";
/*
 ^        -> que comece com
\(       -> possua uma abertura de parenteses
		[\d]{2}  -> possua uma sequencia de 2 numeros
		\)       -> possua um fechamento de parenteses
\s{1}    -> uma ocorrencia de espaço
[\d]{4}  -> possua uma sequencia de 4 numeros
-        -> um hifen
[\d]{4}  -> possua uma sequencia de 4 numeros
$        -> fim da string
*/

/***
 * Fim: Validando telefone: (00) 0000-0000
**/



/***
 * Validando telefone: (00) 90000-0000
**/

$string_entrada = "(11) 98122-4666";

$expressao = "^\([\d]{2}\)\s{1}[9]{0,1}[\d]{4}-[\d]{4}$";
/*
 ^        -> que comece com
\(       -> possua uma abertura de parenteses
		[\d]{2}  -> possua uma sequencia de 2 numeros
		\)       -> possua um fechamento de parenteses
\s{1}    -> uma ocorrencia de espaço
[9]{0,1} -> um digito 9 apareça uma ou nenhuma vez
[\d]{4}  -> possua uma sequencia de 4 numeros
-        -> um hifen
[\d]{4}  -> possua uma sequencia de 4 numeros
$        -> fim da string
*/

/***
 * Fim: Validando telefone
**/




/***
 * Validando CPF (o formato): 000.000.000-00
**/

$string_entrada = "234.987.988-00";

// 1ª forma
$expressao = "^[\d]{3}\.[\d]{3}\.[\d]{3}-[\d]{2}$";
/*
 ^        -> que comece com
[\d]{3}  -> possua uma sequencia de 3 numeros
\.       -> possua um ponto
[\d]{3}  -> possua uma sequencia de 3 numeros
\.       -> possua um ponto
[\d]{3}  -> possua uma sequencia de 3 numeros
-        -> um hifen
[\d]{2}  -> possua uma sequencia de 2 numeros
$        -> fim da string
*/


// 2ª forma
$expressao = "^([\d]{3}\.){2}[\d]{3}-[\d]{2}$";
/*
 ^              -> que comece com
([\d]{3}\.){2} -> 2 ocorrencias de 3 numeros seguidos
por ponto(.)
[\d]{3}        -> possua uma sequencia de 3 numeros
-              -> um hifen
[\d]{2}        -> possua uma sequencia de 2 numeros
$              -> fim da string
*/


/***
 * Fim: Validando CPF
**/


/***
 * Validando Data: 02/07/2013
**/

/*
 // Valido, porem, generico demais
$string_entrada = "99/99/9999";
$expressao = "^([\d]{2}\/){2}[\d]{4}$";
*/

// $string_entrada = "02/07/2013";  #valido
$string_entrada = "99/97/2013";  #invalido


//                        10 - 19
// DIAS/        01 - 09   20 - 29   30 - 31
$expressao = "^([0][1-9]|[1-2][0-9]|[3][0-1])\/"
// MESES/ANO   01 - 09   10 - 12    2013
           . "([0][1-9]|[1][0-2])\/[\d]{4}$";

/*
 ^                              -> que comece com
([0][1-9]|[1-2][0-9]|[3][0-1]) -> 01 a 09 OU 10 a 19
OU 20 a 29 OU 30 a 31
\/                             -> seguido de barra
([0][1-9]|[1][0-2])            -> 01 a 09 OU 10 a 12
\/                             -> seguido de barra
[\d]{4}        -> possua uma sequencia de 4 numeros
$              -> fim da string
*/

/***
 * Fim: Validando Data
**/


/***
 * Validando Hora: 21:14:56
**/
$string_entrada = '21:21:30';

//              00 - 19  OU 20 - 23 (:  00  - 59 ) x 2
$expressao = "^([0-1][0-9]|[2][0-3])(:([0-5][0-9])){2}$";
/*
 ^                     -> que comece com
([0-1][0-9]|[2][0-3]) -> 00 a 19 OU 20 a 23
(:([0-5][0-9])){2}    -> 2 ocorrencias de dois-pontos
seguido por 00 a 59
$                     -> fim da string
*/

/***
 * Fim: Validando Hora
**/

if( preg_match( "/$expressao/", $string_entrada ) ) {
	echo "Valido";
} else {
	echo "Invalido";
}

echo "<hr>";





/***
 * Validando Email : thiago.oliveira@4linux.com.br
**/

$string_entrada = array("thiago.oliveira@4linux.com.br",
						"_thiago@4linux.com.br",
						"thiago@4linux",
						'thiago$oliveira@4linux.com.br',
						'thiago@php.prof.4linux.eu.com',
						'4linux@4linux.com',
						'4linux@4linux.instrutores',
						'contato@%linux.com', );

$expressao = "^[a-zA-Z0-9][a-zA-Z0-9\._-]*@"
           . "([a-zA-Z0-9-]+\.)+[a-zA-Z]+(\.[a-zA-Z])*$";


foreach ( $string_entrada as $email ) {
	echo "$email - ";
	if (preg_match ( "/$expressao/", $email )) {
		echo "Valido <br>";
	} else {
		echo "Invalido <br>";
	}
}

/***
 * Fim: Validando Email
 **/