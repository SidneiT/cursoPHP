<?php
// lendo link simbolico
$info = readlink( '13_symlink.txt' );

// exibindo
echo '<pre>';
print_r( $info );
