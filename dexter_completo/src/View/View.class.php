<?php

namespace View;
use Model\Menus;
use Lib\Config;

/**
 * Classe para gerenciamento das Views (templates)
 *
 * @package View
 */
final class View 
{

	/**
	 * Carregar View
	 * 
	 * @param string $tipo
	 * @param string $arquivo
	 * @param stdClass|array $dados
	 * 
	 * @return void
	 * 
	 * @throws \Exception
	 */
	static public function carregar( $tipo, $arquivo, $dados = array() ) 
	{
	
		# Carregando items do menu
		$obj_Menus	= new Menus();
		$items_menu	= $obj_Menus->retornarItens( $tipo );
		
		# Recuperando configuracao relacionada ao path
		$path		= Config::get('path');
		
		# verificando se view existe
		if( file_exists( __DIR__ . "/../../templates/$tipo/$arquivo.tpl.php" ) ) {
			# inclusao arquivo cabecalho.tpl.php
			require __DIR__ . "/../../templates/$tipo/_cabecalho.tpl.php";
			
			require __DIR__ . "/../../templates/$tipo/$arquivo.tpl.php";

			# inclusao arquivo cabecalho.tpl.php
			require __DIR__ . "/../../templates/$tipo/_rodape.tpl.php";
		} else {
			throw new \Exception( "View nao encontrada!" );
		}	
	}	
	
}