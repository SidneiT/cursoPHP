<?php

namespace Lib;

/**
 * Classe para carregar configuracoes
 * 
 * @package    Lib
 */
final class Config 
{
	
	/**
	 * Array com configurações
	 * @var array
	 */
	static private $config;
	
	/**
	 * Carregar Configuracoes
	 * 
	 * @param $arquivo
	 * 
	 * @return void
	 */
	static public function carregar( $arquivo = 'config.php' )
	{
		self::$config = include __DIR__ . "/../../config/{$arquivo}";
	}
	
	/**
	 * Retornar valor
	 * 
	 * @param string $param
	 * 
	 * @return mixed
	 * 
	 * @throws \Exception
	 */
	static public function get( $param )
	{
		$parametro = explode('.', $param );
		
		$retorno = self::$config;
		
		foreach( $parametro as $par ) {
			if( isset( $retorno[ $par ] ) ) {
				$retorno = $retorno[ $par ];
			} else {
				throw new \Exception('Parametro nao encontrado!');
			}
		}
		
		return $retorno;
	}
}