<?php
// abrindo um arquivo
$arquivo = fopen('00_arquivo.txt', 'w');

// escrevendo no arquivo
fwrite( $arquivo, 'NOVO CONTEUDO' );