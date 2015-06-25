<?php
// informações do arquivo
$info = stat( '00_arquivo.txt' );

// exibindo
echo '<pre>';
print_r( $info );
