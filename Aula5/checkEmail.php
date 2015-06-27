<?php
$pdo = new PDO ( "pgsql:host=localhost;dbname=brasil", "postgres", "123456" );

$sql = "SELECT * FROM cidades where estado_id='{$_GET['id']}' order by nome";
$list = $pdo->query ( $sql );

$cidades ='';
foreach ( $list as $c ) {
	
	$cidades .= "<option value='{$c['id']}'>{$c['nome']}</option> \n";
}

echo json_encode ( ['cidades' => $cidades] );		
