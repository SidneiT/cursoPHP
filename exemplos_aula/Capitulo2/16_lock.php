<?php
// abrindo arquivo
$arquivo = fopen("00_arquivo.txt", "r+");

// solicitando acesso exclusivo
if( flock($arquivo, LOCK_EX | LOCK_NB ) ) {

	fwrite($arquivo, "escrevendo conteudo\n");
	sleep(40);
    // liberar o arquivo
    flock($arquivo, LOCK_UN);
} else {
    echo "Arquivo bloqueado!";
}

fclose($arquivo);