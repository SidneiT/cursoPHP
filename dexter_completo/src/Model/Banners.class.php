<?php
namespace Model;

use Model\ModelBase;
use View\Mensagem;

/**
 * Classe Banners, model com toda regra de negocios de banner
 *
 * @package Model
 */
class Banners extends ModelBase
{
	/**
	 * Constante com nome da tabela
	 * @var string
	 */
	const TABELA = 'banners';
	
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
	                            'descricao',
								'imagem', );
	
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
	 * Listar
	 * 
	 * @return array
	 */
	public function listar()
	{
		return $this->obj_Banco->selecionar( $this->obj_ModelData );
	}
	
	/**
	 * Gerenciar Banners
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
	        @header('Location: admin.php?modulo=Banners&acao=gerenciar');
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
	        @header('Location: admin.php?modulo=Banners&acao=gerenciar');
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

	    if( $_POST ) {
	        
            // Validando se todos os campos foram preenchidos
            if( is_bool( array_search('', $_POST) ) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK ) {

	            // tratando o envio do arquivo
	            if( $_FILES ) {
            	    // gerando nome do arquivo
            	    $date = date('YmdHis');
            	    $nome_arquivo = "banner/{$date}_{$_FILES['imagem']['name']}";
            	    
            	    # Capitulo 2 - Laboratorio 1
            	    
                    move_uploaded_file( $_FILES['imagem']['tmp_name'], __DIR__ . "/../../public/{$nome_arquivo}");
	            }
	            
	            // alimentado objeto ModelData para ser persistido
	            $this->obj_ModelData->descricao = $_POST['descricao'];
	            $this->obj_ModelData->imagem    = $nome_arquivo;
	            
	            // recuperando registro atual
	            $registro_atual = $this->obj_Banco->selecionar( $this->obj_ModelData, false );

	            // se registro ja existia, e foi enviado novo arquivo, limpa arquivo atual
	            if( $registro_atual && $_FILES ) {
	            	
	            	# Capitulo 2 - Laboratorio 1
	            	
	                if( file_exists( __DIR__ . "/../../public/{$registro_atual->imagem}" ) ) {
	            	    unlink( __DIR__ . "/../../public/{$registro_atual->imagem}" );
	                }
	            }	            
	            
	        	// Salvar Cliente
	        	if( isset( $this->obj_ModelData->{static::PRIMARY_KEY} ) ) {
	        		$this->obj_Banco->atualizar( $this->obj_ModelData );
	        	} else {
	        		$this->obj_Banco->inserir( $this->obj_ModelData );
	        	}
	        
	        	Mensagem::set("Cadastro salvo com sucesso!", 'success');
	        
	        	return true;
	        	
	        } elseif( !is_bool( array_search('', $_POST) ) ) {
	        	Mensagem::set("Todos os campos do formulário são obrigatórios", 'error');
	        } elseif( $_FILES['imagem']['error'] ) { 
                
	        	// Tratar erros $_FILES['imagem']['error']
	            switch( $_FILES['imagem']['error'] ) {
	            	
	            	# Capitulo 2 - Laboratorio 1
	            	
	                case UPLOAD_ERR_INI_SIZE:  // 1
	                    Mensagem::set("Tamanho do arquivo invalido (limite php.ini)", 'error');
	                    break;
	                
	                case UPLOAD_ERR_FORM_SIZE: // 2
	                    Mensagem::set("Tamanho do arquivo invalido (limite formulario)", 'error');
	                    break;
	                    
	                case UPLOAD_ERR_PARTIAL: // 3
	                    Mensagem::set("Arquivo não foi transferido corretamente", 'error');
	                    break;
	                    
	                case UPLOAD_ERR_NO_FILE: // 4
	                    Mensagem::set("Arquivo não selecionado", 'error');
	                    break;
	                    
	                case UPLOAD_ERR_NO_TMP_DIR: // 6
	                    Mensagem::set("Não encontrado diretorio temporário", 'error');
	                    break;
	                    
	                case UPLOAD_ERR_CANT_WRITE: // 7
	                    Mensagem::set("Não foi possível escrever o arquivo no servidor", 'error');
	                    break;
	                    
	                case UPLOAD_ERR_EXTENSION: // 8
	                    Mensagem::set("Extensão inválida (vide php.ini)", 'error');
	                    break;
	            }	            	            
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
    
    	// recuperando registro atual
    	$registro_atual = $this->obj_Banco->selecionar( $this->obj_ModelData, false );
    	
    	// se registro ja existia, e foi enviado novo, limpa arquivo atual
    	if( $registro_atual ) {
    		
    		# Capitulo 2 - Laboratorio 1
    		
    		if( file_exists( __DIR__ . "/../../public/{$registro_atual->imagem}" ) ) {
    			unlink( __DIR__ . "/../../public/{$registro_atual->imagem}" );
    		}
    	}    	
    	
    	// excluir o registro
    	$this->obj_Banco->deletar( $this->obj_ModelData );
    	
    	Mensagem::set("Registro excluído com sucesso!", 'success');
    
    	@header('Location: admin.php?modulo=Banners&acao=gerenciar');
	}
	
}