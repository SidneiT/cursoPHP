<?php

namespace Lib;

use Lib\Config;
use Model\ModelData;
use Lib\Log;

/**
 * Classe para persistencia no banco
 *
 * @package    Lib
 */
final class Banco 
{

	/**
	 * Traits
	 */
	use Log;
	
	/**
	 * Objeto da classe Banco
	 * @var Banco
	 */
  	static private $obj_Banco;

  	/**
  	 * Objeto da classe PDO
  	 * @var \PDO
  	 */
  	private $obj_PDO;

  	/**
  	 * Singleton para retorno de instancia da classe Banco
  	 * 
  	 * @return Banco 
  	 */
  	static public function getInstancia() 
  	{
    	if( !self::$obj_Banco ) {
      		self::$obj_Banco = new Banco();
      		self::$obj_Banco->conectar();
    	}

    	return self::$obj_Banco;
  	}
  	
  	/**
  	 * Cria objeto da classe PDO (cria conexao com o banco)
  	 * 
  	 * @return void
  	 */
	private function conectar() 
	{    	
		switch( Config::get('pdo.driver') ) {
		    case 'sqlite':
		    	$dsn  = Config::get('pdo.driver') . ':' . Config::get('pdo.path');
		    	$user = null;
		    	$pass = null;
		    	break;
		    
		    default:
		    	$dsn  = Config::get('pdo.driver') . ':host=' . Config::get('pdo.host')
		    	      . ';dbname='.Config::get('pdo.dbname');
		    	$user = Config::get('pdo.user');
		    	$pass = Config::get('pdo.pass');
		}
    	
		// Cria objeto da classe PDO
    	$this->obj_PDO = new \PDO( $dsn, $user, $pass );

    	// Determinando a forma padrao de tratamento de erros
    	$this->obj_PDO->setAttribute( \PDO::ATTR_ERRMODE,
    								  \PDO::ERRMODE_EXCEPTION );
    	
    	// Determinando a forma padrao de retorno de dados SELECT
    	$this->obj_PDO->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE,
                                      \PDO::FETCH_OBJ );    

    	$this->escrever('Conectado ao banco \'' . Config::get('pdo.driver') . '\'');
  	}
    
    /**
     * Executa comando SQL
     * 
     * @param string $sql
     * @param array $valores
     * 
     * @return mixed
     * 
     * @throws \PDOException
     */
    public function executarSQL( $sql ) 
    {	
    	$this->escrever("SQL executada : '$sql'");
    	
    	return $this->obj_PDO->exec( $sql );
  	}
    
    /**
     * Executa consulta SQL
     * 
     * @param string $sql
     * @param array $valores
     * 
     * @return mixed
     * 
     * @throws \PDOException
     */
    public function consultarSQL( $sql, array $valores = array() ) 
    {	
    	$statement = $this->obj_PDO->prepare( $sql );
    	$statement->execute( $valores );

    	$this->escrever("SQL executada : '$sql'");
    	$this->escrever("SQL parametros : (" . implode(', ', $valores) . ")");

    	return $statement->fetchAll();
  	}
  	
  	/**
  	 * Executar INSERT
  	 * 
  	 * @param ModelData $registro
  	 * 
  	 * @return boolean
     * 
     * @throws \PDOException
  	 */
  	public function inserir( ModelData $ModelData ) 
  	{
  		foreach( $ModelData->getDados() as $coluna => $valor ) {
      		$colunas[] = $coluna;
      		$holders[] = '?';
     		$valores[] = $valor;
    	}

    	$colunas = implode( ', ', $colunas );
    	$holders = implode( ', ', $holders );

    	$sql = "INSERT INTO {$ModelData->getTabela()} ({$colunas}) "
        	 . "VALUES ({$holders})";

    	$statement = $this->obj_PDO->prepare( $sql );

    	$this->escrever("SQL executada : '$sql'");
    	$this->escrever("SQL parametros : (" . implode(', ', $valores) . ")");

    	return $statement->execute( $valores );
  	}

  	/**
  	 * Executar UPDATE
  	 *
  	 * @param ModelData $ModelData
  	 *
  	 * @return boolean
  	 *
  	 * @throws \PDOException
  	 */
  	public function atualizar( ModelData $ModelData ) 
  	{
    	foreach( $ModelData->getDados() as $coluna => $valor ) {
    		
    		// extrai dados para construcao do SQL, mas exclui a coluna PK
      		if( $coluna != $ModelData->getPrimaryKey() ) {
        		$colunas[] = "{$coluna} = ?";
        		$valores[] = $valor;
      		}
    	}
    	
    	$valores[] = $ModelData->getValorPrimaryKey();

    	$colunas = implode( ', ', $colunas );

    	$sql = "UPDATE {$ModelData->getTabela()} SET {$colunas} "
        	 . "WHERE {$ModelData->getPrimaryKey()} = ?";

    	$statement = $this->obj_PDO->prepare( $sql );

    	$this->escrever("SQL executada : '$sql'");
    	$this->escrever("SQL parametros : (" . implode(', ', $valores) . ")");

    	return $statement->execute( $valores );
  	}

  	/**
  	 * Executar SELECT
  	 * 
  	 * @param ModelData $ModelData
  	 * @param boolean $todos
  	 * 
  	 * @return mixed
  	 * 
  	 * @throws \PDOException
  	 */
  	public function selecionar( ModelData $ModelData, $todos = true ) 
  	{
  		$sql = "SELECT * FROM {$ModelData->getTabela()}";
  		
  		// Construcao Where
  		$parametro_where = array();
  		
		if( $todos == false ) {
      		$sql .= " WHERE {$ModelData->getPrimaryKey()} = ?";
      		$parametro_where[] = $ModelData->getValorPrimaryKey();
    	}
    	
    	$statement = $this->obj_PDO->prepare( $sql );
	    $statement->execute( $parametro_where );

    	$this->escrever("SQL executada : '$sql'");
    	$this->escrever("SQL parametros : (" . implode(', ', $parametro_where) . ")");

	    if( $todos ) {
      		return $statement->fetchAll();
    	} else {
      		return $statement->fetch();
    	}
    }

  	/**
  	 * Executar DELETE
  	 * 
  	 * @param ModelData $ModelData
  	 * 
  	 * @return boolean
     * 
     * @throws \PDOException
  	 */
  	public function deletar( ModelData $ModelData ) 
  	{
    	$sql = "DELETE FROM {$ModelData->getTabela()} "
        	 . "WHERE {$ModelData->getPrimaryKey()} = ?";

    	$statement = $this->obj_PDO->prepare( $sql );

    	$this->escrever("SQL executada : '$sql'");
    	$this->escrever("SQL parametros : (" . $ModelData->getValorPrimaryKey() . ")");

    	return $statement->execute( array( $ModelData->getValorPrimaryKey() ) );
  	}
  	
}