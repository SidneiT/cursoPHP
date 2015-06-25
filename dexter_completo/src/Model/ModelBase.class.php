<?php

namespace Model;

use Model\ModelData;
use Lib\Banco;

/**
 * Classe ModelBase, servirá de base para todas as models
 *
 * @package Model
 */
abstract class ModelBase {

	/**
	 * Objeto de ModelData
	 * @var ModelData
	 */
	protected $obj_ModelData;
	
	/**
	 * Objeto Banco
	 * @var Banco
	 */
	protected $obj_Banco;
	
	/**
	 * Construtor
	 * 
	 * @return void
	 */
	public function __construct() 
	{
		$this->obj_ModelData = new ModelData( static::TABELA, static::PRIMARY_KEY, $this->colunas);
		$this->obj_Banco 	 = Banco::getInstancia();
	}
	
	/**
	 * Extrair informacoes do $_POST
	 * 
	 * Analisa os dados da superglobal $_POST, armazenando os valores validos
	 * no objeto ModelData
	 * 
	 * @return void
	 */
	protected function extrairDadosPost() 
	{
		foreach( $_POST as $nome_coluna => $valor ) {
			$this->obj_ModelData->$nome_coluna = $valor;
		}
	}

	/**
	 * Extrair informacoes do $_GET
	 *
	 * Analisa os dados da superglobal $_GET, armazenando os valores validos
	 * no objeto ModelData
	 *
	 * @return void
	 */
	protected function extrairDadosGet() 
	{
		foreach( $_GET as $nome_coluna => $valor ) {
			$this->obj_ModelData->$nome_coluna = $valor;
		}
	}
	
	/**
	 * Metodo Magico __call
	 * 
	 * Sera chamado sempre que um metodo inexistente for chamado nas models
	 * 
	 * @return array 
	 */
	public function __call( $metodo, $params )
	{
		return array();
	}
}