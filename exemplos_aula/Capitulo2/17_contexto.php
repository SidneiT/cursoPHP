<?php
if( $_POST ) {
	echo "Nome : {$_POST['nome']}";
	exit();
}

$opts = array(
		'http'=>array(
				'method' => 'POST',
				'header' => "Content-type: application/x-www-form-urlencoded\r\n",
				'content'=> http_build_query( array( 'nome' => 'Fulano' ) )
		)
);

echo "<pre>";

print_r( $opts );

$contexto = stream_context_create($opts);

echo '<hr>';
print_r( $contexto );

$result = file_get_contents('http://localhost/exemplos_aula/Capitulo2/17_contexto.php', false, $contexto);

echo '<hr>';
print_r( $result );