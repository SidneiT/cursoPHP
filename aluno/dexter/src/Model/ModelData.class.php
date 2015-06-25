<?php

namespace Model;

/**
 * Classe para armazenar dados de uma model.
 * Objeto dessa classe, que será persistido no banco 
 *
 * @package Model
 */
final class ModelData {

	/**
	 * Nome da tabela
	 * @var string
	 */
  	private $tabela;
  	
  	/**
  	 * Nome da chave-primaria
  	 * @var string
  	 */
  	private $primary_key;
  	
  	/**
  	 * Colunas existentes na tabela
  	 * @var array
  	 */
  	private $coluna;
  	
  	/**
  	 * Objeto StdClass para armazenamento de valores
  	 * @var \stdClass
  	 */
  	private $obj_std;
  	
  	/**
  	 * Construtor
  	 * 
  	 * @param string $tabela
  	 * @param string $pk
  	 * @param array  $coluna
  	 * 
  	 * @return void
  	 */
  	public function __construct( $tabela, $pk, array $coluna ) 
  	{
    	$this->tabela 		= $tabela;
    	$this->primary_key 	= $pk;
    	$this->coluna 		= $coluna;
    	$this->obj_std		= new \stdClass();
    	
    	// inicia $this->obj_std
    	foreach( $coluna as $col ) {
    		if( $col != $pk ) {
    			$this->obj_std->$col = null;
    		}
    	}
  	}
  	
	/**
	 * Retorna o nome da tabela
	 * 
	 * @return string
	 */
  	public function getTabela() 
  	{
    	return $this->tabela;
  	}

  	/**
  	 * Retorna a chave-primaria
  	 * 
  	 * @return string
  	 */
  	public function getPrimaryKey() 
  	{
    	return $this->primary_key;
  	}
  	
  	/**
  	 * Retorna o valor da chave-primaria
  	 * 
  	 * @return int | string
  	 */
  	public function getValorPrimaryKey() 
  	{
    	# Exemplo equivale a: 
    	# return $this->obj_std->pro_id;
    	
    	return $this->obj_std->{$this->primary_key};
  	}
  	
  	/**
  	 * Retorna objeto stdClass, que ira possuir todos os dados a 
  	 * ser persistido
  	 * 
  	 * @return \stdClass
  	 */
  	public function getDados() 
  	{
    	return $this->obj_std;
  	}

  	/**
  	 * Metodo Magico __set
  	 * 
  	 * Irá armazenar dentro do objeto stdClass, o valor de determinada coluna,
  	 * desde que, essa coluna seja válida
  	 * 
  	 * @param string $propriedade
  	 * @param mixed $valor
  	 * 
  	 * @return void
  	 */
  	public function __set( $propriedade, $valor ) 
  	{
  		if( in_array( $propriedade, $this->coluna ) ) {
  			$this->obj_std->{$propriedade} = $valor;
  		}
  	}
  	
  	/**
  	 * Metodo Magico __get
  	 * 
  	 * Irá recuperar do objeto stdClass, o valor de determiinada coluna,
  	 * desde que, essa coluna seja válida
  	 * 
  	 * @param string $propriedade
  	 * 
  	 * @return void
  	 */
  	public function __get( $propriedade ) 
  	{
  		if( in_array( $propriedade, $this->coluna ) ) {
  			return $this->obj_std->$propriedade;
  		}
  	}
  	
  	/**
  	 * Metodo Magico __isset
  	 * 
  	 * Irá verificar se determinada coluna existe no objeto stdClass
  	 * 
  	 * @param string $propriedade
  	 * 
  	 * @return boolean
  	 */
  	public function __isset( $propriedade ) 
  	{
  		return isset( $this->obj_std->{$propriedade} );
  	}  
  
}