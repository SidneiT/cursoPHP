<?php
# Capitulo 4 - Laboratorio 1 (Client REST)

$opts = array(
	'http'=>array(
		'method' => 'POST',
		'header' => "Content-type: application/x-www-form-urlencoded\r\n",
		'content'=> http_build_query( 
						array( 'retorno' => 'json',
							   'acao'	 => 'te_consultar' ) 
					)
	)
);

$contexto = stream_context_create($opts);

$result = file_get_contents('http://localhost/aluno/dexter/ws_rest.php', false, $contexto);

echo $result;



echo '<hr>';

$result = file_get_contents('http://localhost/aluno/dexter/ws_rest.php?retorno=json&acao=te_consultar');

echo $result;
