<?php
namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Classe Funcionarios, model com toda regra de negocios de funcionarios
 *
 * @package Model
 */
class Funcionarios extends ModelBase
{
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'funcionarios';
	
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
								'email',
								'prf_id',
								'nome',
								'senha', );
	
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
	 * Autenticacao do funcionario
	 * 
	 * @return void
	 */
	public function logar()
	{
		if($_POST) {
						
			// Valida endereco de email
			if( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
				Mensagem::set("E-mail informado é inválido!", 'error');
				return false;
			}
			
			$sql = "SELECT nome FROM " . self::TABELA
			     . " WHERE email = ? AND senha = ?";
			
			$this->extrairDadosPost();
			
			$this->criptografarSenha();
			
			$valores = array( $this->obj_ModelData->email, $this->obj_ModelData->senha );
			
			$funcionario = $this->obj_Banco->consultarSQL($sql, $valores);
			 
			if( count( $funcionario ) ) {
				$_SESSION['funcionarios']['email'] = $funcionario[0]->email;
				$_SESSION['funcionarios']['nome']  = $funcionario[0]->nome;
				session_commit();				
			} else {
				Mensagem::set("E-mail e/ou senha inválidos!", 'error');
			}
		}
		
		@header("Location: {$_SERVER['HTTP_REFERER']}");
	}
	
	/**
	 * Deslogar do cliente
	 * 
	 * @return void 
	 */
	public function deslogar()
	{
		unset($_SESSION['funcionarios']);
		@header("Location: {$_SERVER['HTTP_REFERER']}");
	}
	
	/**
	 * Gerenciar
	 * 
	 * @return boolean | array
	 */
	public function gerenciar() 
	{
		return $this->obj_Banco->selecionar( $this->obj_ModelData );
	}
	
	/**
	 * Acao ao para tratar Inserir
	 * 
	 * @return \stdClass
	 */
	public function inserir()
	{
		if( $this->salvar() ) {
			@header('Location: admin.php?modulo=Funcionarios&acao=gerenciar');
		}

		return $this->obj_ModelData->getDados();
	}
	
	/**
	 * Acao ao para tratar Editar
	 *
	 * @return \stdClass
	 */
	public function editar()
	{	
		if( $this->salvar() ) {
			@header('Location: admin.php?modulo=Funcionarios&acao=gerenciar');
		}
		
		return $this->obj_Banco->selecionar( $this->obj_ModelData, false );
	}
	
	/**
	 * Salvar Cliente (valido para Edicao / Insercao)
	 * 
	 * @return boolean
	 */
	private function salvar()
	{
		// alimentar objeto ModelData a partir do $_POST
		$this->extrairDadosPost();
		
    	// $_GET => Obj Registro
    	$this->extrairDadosGet();
		
		if($_POST) {

			if( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
				Mensagem::set("E-mail informado é inválido!", 'error');
				return false;
			} elseif( empty( $_POST['senha'] ) ) {
				Mensagem::set("A senha não foi preenchida!", 'error');
			} elseif($_POST['senha'] != $_POST['conf_senha']) {
				Mensagem::set("As senhas não conferem!", 'error');
			} else {
				
				$this->criptografarSenha();
				
				// Salvar Cliente
				if( isset( $this->obj_ModelData->{static::PRIMARY_KEY} ) ) {
					$this->obj_Banco->atualizar( $this->obj_ModelData );
				} else {
					$this->obj_Banco->inserir( $this->obj_ModelData );
				}
		
				Mensagem::set("Cadastro salvo com sucesso!", 'success');
				
				return true;
			}
		}

		return false;
	}
    
    /**
     * Deletar cliente
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
    
    	@header('Location: admin.php?modulo=Funcionarios&acao=gerenciar');
    }
    
    /**
     * Criptografar senha
     * 
     * @return void
     */
    private function criptografarSenha() 
    {
    	$this->obj_ModelData->senha = md5( $this->obj_ModelData->senha );
    }
}