<?php

namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Classe Clientes, model com toda regra de negocios de clientes
 *
 * @package Model
 */
class Clientes extends ModelBase
{
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'clientes';
	
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
								'nome_razao',
								'cpf_cnpj',
								'email',
								'telefone', );

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
	 * Gerenciar Clientes
	 * 
	 * @return boolean | array
	 */
	public function gerenciar() 
	{
		return $this->obj_Banco->selecionar( $this->obj_ModelData );
	}
	
	/**
	 * Acao ao para tratar Cadastro
	 * 
	 * @return \stdClass
	 */
	public function cadastro()
	{
		if( $this->salvar() ) {
			@header('Location: index.php?modulo=Clientes&acao=cadastro');
		}
		
		return $this->obj_ModelData->getDados();
	}
	
	/**
	 * Acao ao para tratar Inserir
	 * 
	 * @return \stdClass
	 */
	public function inserir()
	{
		if( $this->salvar() ) {
			@header('Location: admin.php?modulo=Clientes&acao=gerenciar');
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
			@header('Location: admin.php?modulo=Clientes&acao=gerenciar');
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
		
		if( $_POST ) {
			// Verifica se todos os campos foram preenchidos
			if( is_bool( array_search('', $_POST) ) ) {
				
				// valida formato CPF / CNPJ
				// 000.000.000-00     -> 14 caracteres
				// 00.000.000/0000-00 -> 18 caracteres
				$total_caracteres = strlen( $_POST['cpf_cnpj'] );				
				if( $total_caracteres == 14 || $total_caracteres == 18  ) {

					// Valida CPF
					if( $total_caracteres == 14 ) {
						# Capitulo 8 - Laboratorio 1
						if( !preg_match("/^([0-9]{3}\.){2}[0-9]{3}\-[0-9]{2}$/", $_POST['cpf_cnpj']) ) {
							Mensagem::set("CPF com formato invalido", 'error');
							return false;
						}
					}

					// Valida CNPJ
					if( $total_caracteres == 18 ) {
						# Capitulo 8 - Laboratorio 1
						if( !preg_match("/^[0-9]{2}(\.[0-9]{3}){2}\/[0-9]{4}\-[0-9]{2}$/", $_POST['cpf_cnpj']) ) {
							Mensagem::set("CNPJ com formato invalido", 'error');
							return false;
						}
					}						
					
				} else {
					Mensagem::set("CPF / CNPJ deve ser informado com pontuação!", 'error');
					return false;
				}
				
				// Valida endereco de email
				# Capitulo 9 - Laboratorio 1
				if( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
					Mensagem::set("E-mail informado é inválido!", 'error');
					return false;
				}
				
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
    
    	@header('Location: admin.php?modulo=Clientes&acao=gerenciar');
    }
}