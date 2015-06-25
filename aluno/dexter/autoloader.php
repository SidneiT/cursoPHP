<?php
/**
 * Função de autoload
 * 
 * @param string $classe
 * 
 * @return void
 */
function autoloader( $classe )
{
	$extensoes = array( 'class.php', 'trait.php' );
	
	$classe = str_replace('\\', '/', $classe);

	foreach( $extensoes as $extensao ) {
		$path_classe = __DIR__ . "/src/{$classe}.{$extensao}";

		if( file_exists( $path_classe ) ) {
			require_once $path_classe;
			break;
		}
	}
}

spl_autoload_register('autoloader');