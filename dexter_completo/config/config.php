<?php
/*
 * Array de configuracao
 */
return array(

    // Parametros de configuracao PDO
    'pdo'	=> array(
                'driver' => 'pgsql',
                'dbname' => 'dexter',
                'host'	 => 'localhost',
                'user'	 => 'dexter',
                'pass'	 => '123456',
    ),

    // Configuracao do Log
    'log'   => array(
                'path'   => __DIR__ . '/../log/dexter.log',
    ),
		
	// Path aplicacao
	'path'	=> './',	# Capítulo 6 - Laboratorio 1

);