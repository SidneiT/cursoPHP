<?php
namespace Model;

use Model\ModelBase;

/**
 * Classe Perfis, model com toda regra de negocios de perfis
 *
 * @package Model
 */
class Perfis extends ModelBase
{
	/**
	 * Constante acesso publico
	 * @var int
	 */
	const FRONTEND = 'front';
	
	/**
	 * Constante acesso privado
	 * @var int
	 */
	const ADMINISTRATIVO = 'admin';
	
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'perfis';
	
	/**
	 * Constante com nome da chave-primaria
	 * @var string
	 */
	const PRIMARY_KEY = 'id';
	
	/**
	 * Colunas existente na tabela
	 * 
	 * @var array
	 */
	protected $colunas = array( 'id',
								'descricao', );

	/**
	 * Objeto de Perfis (singleton)
	 * @var Perfis
	 */
	static private $obj_Perfis;
	
	
	/**
	 * Construtor
	 * 
	 * @return void
	 */	
	public function __construct() 
	{
		parent::__construct();
	}
	
	/**
	 * Retorna instancia de Perfis (Singleton)
	 * 
	 * @return Perfis
	 */
	static public function getInstancia()
	{
		if( !self::$obj_Perfis ) {
			self::$obj_Perfis = new Perfis();
		}
		return self::$obj_Perfis;
	}
	
	/**
	 * Listar
	 * 
	 * @return array
	 */
	public function listar()
	{
		return $this->obj_Banco->selecionar( $this->obj_ModelData );
	}
	
	/**
	 * Retorna Descricao Perfil
	 * 
	 * @param $id string
	 * 
	 * @return array
	 */
	public function getPerfil( $id )
	{
		$this->obj_ModelData->id = $id;
		
		return $this->obj_Banco->selecionar( $this->obj_ModelData, false );
	}
}