<?php
// abrindo um arquivo
$arquivo = fopen('00_arquivo.txt', 'r');

// lendo 3 bytes do arquivo
$leitura = fread( $arquivo, 3 );

// exibindo o que é gerado
print_r( $leitura );