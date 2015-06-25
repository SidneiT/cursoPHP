<?php
namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Classe Menus, model com toda regra de negocios de menus
 *
 * @package Model
 */
class Menus extends ModelBase
{
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'menus';
	
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
								'prf_id',
								'descricao',
								'link', );
	
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
	 * Listar itens do Menu
	 * 
	 * @param string $area
	 * 
	 * @return array
	 */
	public function retornarItens( $tipo )
	{
		$sql = "SELECT descricao, link "
			 . "FROM " . self::TABELA
			 . " WHERE prf_id = ? "
			 . "ORDER BY id ASC";
		
		return $this->obj_Banco->consultarSQL($sql, array( $tipo ) );
	}
	
	/**
	 * Gerenciar itens do Menu
	 * 
	 * @return array
	 */
	public function gerenciar()
	{
	    return $this->obj_Banco->selecionar( $this->obj_ModelData );
	}
	
	/**
	 * Inserir novo item menu
	 * 
	 * @return \stdClass
	 */
	public function inserir()
	{
	    if( $this->salvar() ) {
	        @header('Location: admin.php?modulo=Menus&acao=gerenciar');
	    }
	    
	    return $this->obj_ModelData->getDados();
	}
	
	/**
	 * Editar item menu
	 * 
	 * @return \stdClass
	 */
	public function editar()
	{
	    if( $this->salvar() ) {
	        @header('Location: admin.php?modulo=Menus&acao=gerenciar');
	    }
	    
	    return $this->obj_Banco->selecionar( $this->obj_ModelData, false );
	}
	
	/**
	 * Salvar item menu
	 * 
	 * @return boolean
	 */
	private function salvar()
	{
	    // Extrair informacoes do $_GET
	    $this->extrairDadosGet();
	    
	    // Extrair informacoes do $_POST
	    $this->extrairDadosPost();
	    
	    if( $_POST ) {
	        
	        // Verifica se todos os campos foram preenchidos
	        if( is_bool( array_search('', $_POST) ) ) {
	        	// Salvar Cliente
	        	if( isset( $this->obj_ModelData->{static::PRIMARY_KEY} ) ) {
	        		$this->obj_Banco->atualizar( $this->obj_ModelData );
	        	} else {
	        		$this->obj_Banco->inserir( $this->obj_ModelData );
	        	}
	        
	        	Mensagem::set("Cadastro salvo com sucesso!", 'success');
	        
	        	return true;
	        } else {
	        	Mensagem::set("Todos os campos do formulário são obrigatórios", 'error');
	        }	        
	        
	    }
	    
	    return false;
	}
	
	/**
	 * Excluir item menu
	 * 
	 * @return void
	 */
	public function excluir()
	{    	
	    // $_GET => Obj Registro
    	$this->extrairDadosGet();
    
    	// excluir o registro
    	$this->obj_Banco->deletar( $this->obj_ModelData );
    	
    	Mensagem::set("Registro excluído com sucesso!", 'success');
    
    	@header('Location: admin.php?modulo=Menus&acao=gerenciar');
	}
	
}