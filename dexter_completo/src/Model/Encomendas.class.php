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
		$obj_DOMDocument = new \DOMDocument();
		$obj_DOMDocument->load( $this->arquivo );

		$atributos = $obj_DOMDocument->getElementsByTagName('encomendas');
		$this->ultimo_id = (int) $atributos->item(0)->getAttributeNode('ultimo_id')->value;

		$encomendas = $obj_DOMDocument->getElementsByTagName('encomenda');

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
	    $obj_DOMDocument = new \DOMDocument( '1.0', 'UTF-8');
	    $obj_DOMDocument->formatOutput = true;

	    // Criando documento tag root - 'encomendas'
		# Capitulo 3 - Laboratorio 2
	    $encomendas = $obj_DOMDocument->createElement('encomendas');
        $obj_DOMDocument->appendChild( $encomendas );
	    
	    // Acrescentadando novo atributo
		# Capitulo 3 - Laboratorio 2
	    $ultimo_id = $obj_DOMDocument->createAttribute('ultimo_id');
	    $ultimo_id->value = $this->ultimo_id;
	    $encomendas->appendChild( $ultimo_id );

		foreach( $this->elementos_XML as $obj ) {
			# Capitulo 3 - Laboratorio 2
			$encomenda = $obj_DOMDocument->createElement('encomenda');

			// Atributos
			$id = $obj_DOMDocument->createAttribute('id');
			$id->value = $obj->id;
			$encomenda->appendChild( $id );
			
			$dt_criacao = $obj_DOMDocument->createAttribute('dt_criacao');
			$dt_criacao->value = $obj->dt_criacao;
			$encomenda->appendChild( $dt_criacao );
			
			$dt_edicao = $obj_DOMDocument->createAttribute('dt_edicao');
			$dt_edicao->value = $obj->dt_edicao;
			$encomenda->appendChild( $dt_edicao );
			
			// Elementos
			$origem = $obj_DOMDocument->createElement('origem', $obj->origem);
			$encomenda->appendChild( $origem );
			
			$destino = $obj_DOMDocument->createElement('destino', $obj->destino);
			$encomenda->appendChild( $destino );

			$atual = $obj_DOMDocument->createElement('atual', $obj->atual);
			$encomenda->appendChild( $atual );
			
			// Adicionando nó ao elemento root
			$encomendas->appendChild( $encomenda );
		}

		// Salvando XML no arquivo
		# Capitulo 3 - Laboratorio 2
		$obj_DOMDocument->save( $this->arquivo );
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
		$obj_std->id         = $elemento->getAttribute('id');			# Capitulo 3 - Laboratorio 2
		$obj_std->dt_criacao = $elemento->getAttribute('dt_criacao');	# Capitulo 3 - Laboratorio 2
		$obj_std->dt_edicao  = $elemento->getAttribute('dt_edicao');	# Capitulo 3 - Laboratorio 2
		
		$obj_std->origem  = $elemento->getElementsByTagName('origem')->item(0)->nodeValue; 	# Capitulo 3 - Laboratorio 2
		$obj_std->destino = $elemento->getElementsByTagName('destino')->item(0)->nodeValue;	# Capitulo 3 - Laboratorio 2
		$obj_std->atual   = $elemento->getElementsByTagName('atual')->item(0)->nodeValue;	# Capitulo 3 - Laboratorio 2

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
	    $obj_DOMDocument = new \DOMDocument();
	    $obj_DOMDocument->load( $this->arquivo );
	     
	    // XPath
	    # Capitulo 3 - Laboratorio 3
	    $obj_DOMXpath = new \DOMXPath( $obj_DOMDocument );
	     
	    // Consulta
	    # Capitulo 3 - Laboratorio 3
	    $resultado = $obj_DOMXpath->query("encomenda[@id={$id}]");
	     
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
	    $resultado = $this->localizarEncomenda( $id );
    
        if( !$resultado ) {
            return "Nada encontrado";
        }
    
    	return json_encode( $resultado[0] );
	}

}
