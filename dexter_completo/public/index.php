<?php
// Inclusao do arquivo de bootstrap
require __DIR__ . '/../bootstrap.php';

use Controller\Controller;
use Model\Perfis;

try {

	new Controller( Perfis::FRONTEND );
	
} catch ( \Exception $e ) {
	echo $e->getMessage();
}