<?php
namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Classe Conteúdos
 *
 * @package Model
 */
class Conteudos extends ModelBase
{
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'conteudos';
	
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
								'titulo',
								'texto', );
	
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
	 * Gerenciar Conteudos
	 * 
	 * @return array
	 */
	public function gerenciar()
	{
	    return $this->obj_Banco->selecionar( $this->obj_ModelData );
	}
	
	/**
	 * Inserir Conteudo
	 * 
	 * @return \stdClass
	 */
	public function inserir()
	{
	    if( $this->salvar() ) {
	        @header('Location: admin.php?modulo=Conteudos&acao=gerenciar');
	    }
	    
	    return $this->obj_ModelData->getDados();
	}
	
	/**
	 * Editar Conteudo
	 * 
	 * @return \stdClass
	 */
	public function editar()
	{
	    if( $this->salvar() ) {
	        @header('Location: admin.php?modulo=Conteudos&acao=gerenciar');
	    }
	    
	    return $this->obj_Banco->selecionar( $this->obj_ModelData, false );
	}
	
	/**
	 * Salvar Conteudo
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
	 * Excluir Conteudo
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
    
    	@header('Location: admin.php?modulo=Conteudos&acao=gerenciar');
	}
	
	/**
	 * Exibir Conteudo
	 * 
	 * @return \stdClass
	 */
	public function exibir()
	{
	    // $_GET => Obj Registro
	    $this->extrairDadosGet();
	    
	    return $this->obj_Banco->selecionar( $this->obj_ModelData, false );
	}
	
}