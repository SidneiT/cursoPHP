<?php

namespace Lib;
use Lib\Config;

/**
 * Trait para escrita de log
 * 
 * @package    Lib
 */
trait Log 
{
	
	/**
	 * Escrever log
	 * 
	 * @return void
	 */
	public function escrever( $mensagem )
	{
		$data        = date('d/m/Y H:i:s');
		$mensagem    = "[ {$data} ] {$mensagem}" . PHP_EOL;
		
		$arquivo     = Config::get('log.path');
		
		# Capitulo 2 - Laboratorio 2		
		file_put_contents( $arquivo, $mensagem, FILE_APPEND );
	}
	
}