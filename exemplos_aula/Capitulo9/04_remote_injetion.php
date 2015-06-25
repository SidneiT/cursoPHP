<?php

echo "<pre>";
echo "Incluindo arquivo sem tratar origem: <br>";

echo file_get_contents( $_GET['conteudo'] );

echo "<hr>";

echo "Incluindo arquivo de forma segura: <br>";

$paginas = array( 'downloads' => 'downloads/index.php' );

if( file_exists( $_GET['conteudo'] ) ) {
  echo file_get_contents( $_GET['conteudo'] );
} else {
  echo "conteudo invalido!!!";
}
