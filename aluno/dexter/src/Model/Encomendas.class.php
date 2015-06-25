<?php
namespace Model;

use View\Mensagem;
use Lib\Log;

/**
 * Classe para manipulação das Encomendas, armazenados no XML
 *
 * @package Model
 */
class Encomendas
{
    use Log;
    
	/**
	 * Arquivo XML a ser persistido
	 * @var string
	 */
	private $arquivo;

	/**
	 * Elementos do XML
	 * @var array
	 */
	private $elementos_XML = array();

	/**
	 * Ultimo ID
	 * @var int
	*/
	private $ultimo_id;

	/**
	 * Construtor
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->arquivo = __DIR__ . '/../../data/encomendas.xml';

		// Carregando arquivo XML
		# Capitulo 3 - Laboratorio 2

		$atributos = ;
		$this->ultimo_id = ;

		$encomendas = ;

		foreach( $encomendas as $encomenda ) {
			# Capitulo 3 - Laboratorio 2
		    $elemento = $this->converterDOM2Std( $encomenda );
			$this->elementos_XML[ (int) $elemento->id ] = $elemento;
		}
	}

	/**
	 * Gravar arquivo XML
	 *
	 * @return void
	 */
	private function gravarArquivo()
	{	    	    
	    // Carregando arquivo XML
		# Capitulo 3 - Laboratorio 2

	    // Criando documento tag root - 'encomendas'
		# Capitulo 3 - Laboratorio 2
	    
	    // Acrescentadando novo atributo
		# Capitulo 3 - Laboratorio 2

		foreach( $this->elementos_XML as $obj ) {
			# Capitulo 3 - Laboratorio 2

			// Atributos
			
			// Elementos
			
			// Adicionando nó ao elemento root
		}

		// Salvando XML no arquivo
		# Capitulo 3 - Laboratorio 2
	}

	/**
	 * Converte DOMElement para stdClass
	 *
	 * @param \DOMElement $obj
	 *
	 * @return \stdClass
	 */
	private function converterDOM2Std( \DOMElement $elemento )
	{
		// criando objeto com informacoes
		$obj_std = new \stdClass();
		
		// recuperando atributos
		$obj_std->id         = ;	# Capitulo 3 - Laboratorio 2
		$obj_std->dt_criacao = ;	# Capitulo 3 - Laboratorio 2
		$obj_std->dt_edicao  = ;	# Capitulo 3 - Laboratorio 2
		
		$obj_std->origem  = ; 	# Capitulo 3 - Laboratorio 2
		$obj_std->destino = ;	# Capitulo 3 - Laboratorio 2
		$obj_std->atual   = ;	# Capitulo 3 - Laboratorio 2

		return $obj_std;
	}

	/**
	 * Gerenciar Encomendas
	 *
	 * @return \stdClass
	 */
	public function gerenciar()
	{
		return $this->elementos_XML;
	}

	/**
	 * Excluir Encomendas
	 *
	 * @param int $id
	 *
	 * @return void
	 */
	public function excluir()
	{
		if( isset( $this->elementos_XML[ $_GET['id'] ] ) ) {
			unset( $this->elementos_XML[ $_GET['id'] ] );
			Mensagem::set('Registro excluído com sucesso!', 'success');
		} else {
			Mensagem::set('Registro não encontrado', 'erro');
		}

		$this->gravarArquivo();

		@header('Location: admin.php?modulo=Encomendas&acao=gerenciar');
	}

	/**
	 * Editar Encomendas
	 *
	 * @return void
	 */
	public function editar()
	{
		if( $this->salvar() ) {
			@header('Location: admin.php?modulo=Encomendas&acao=gerenciar');
		}

		return $this->elementos_XML[ $_GET['id'] ];
	}

	/**
	 * Inserir Encomendas
	 *
	 * @return void
	 */
	public function inserir()
	{
		if( $this->salvar() ) {
			@header('Location: admin.php?modulo=Encomendas&acao=gerenciar');
		}

		return array();
	}

	/**
	 * Salvar Encomendas
	 *
	 * @return boolean
	 */
	private function salvar()
	{
		if( $_POST ) {
			if( isset( $_GET['id'] ) ) {
				$registro = &$this->elementos_XML[ $_GET['id'] ];

				$registro->dt_edicao = date('Y-m-d H:i:s');
			} else {
				$this->ultimo_id++;

				$this->elementos_XML[ $this->ultimo_id ] = new \stdClass();
				$registro = &$this->elementos_XML[ $this->ultimo_id ];

				$registro->id    	  = $this->ultimo_id;
				$registro->dt_criacao = date('Y-m-d H:i:s');
				$registro->dt_edicao  = date('Y-m-d H:i:s');
			}
				
			$registro->origem  = $_POST['origem'];
			$registro->destino = $_POST['destino'];
			$registro->atual   = $_POST['atual'];

			Mensagem::set("Cadastro salvo com sucesso!", 'success');

			$this->gravarArquivo();
			
			return true;
		}

		return false;
	}
	
	/**
	 * Localizar encomenda no XML
	 * 
	 * @param int $id
	 * 
	 * return mixed;
	 */
	public function localizarEncomenda( $id )
	{
	    $retorno = array();
	    
	    // Carregando arquivo XML
	    # Capitulo 3 - Laboratorio 3
	     
	    // XPath
	    # Capitulo 3 - Laboratorio 3
	     
	    // Consulta
	    # Capitulo 3 - Laboratorio 3
	     
	    foreach( $resultado as $encomenda ) {
	    	$retorno[] = $this->converterDOM2Std( $encomenda );
	    }
	     
	    return $retorno;	    
	}
	
	/**
	 * Rastrear encomendas
	 * 
	 * @return array;
	 */
	public function rastrear()
	{	    
	    if( $_POST ) {
	        
	        if( !empty( $_POST['enc_id'] ) ) {
                
	            $consulta = $this->localizarEncomenda( $_POST['enc_id'] );
	            
	            // Liberando Mensagem
	            Mensagem::limpar();
	            
        	    if( !$consulta ) {
        	        Mensagem::set('Encomenda não encontrada!', 'error');
        	    }
        	    
        	    return $consulta;
        	    
	        } else {
	            Mensagem::set('Informe o código da encomenda!', 'error');
	        }
	    }  
	    
	    return false;
	}
	
	/**
	 * Consultar encomendas - SOAP
	 * 
	 * @param int $id
	 * 
	 * @return array;
	 */
	public function consultarEncomenda( $id )
	{	    
	    # Capítulo 4 - Laboratório 2
	}

}
