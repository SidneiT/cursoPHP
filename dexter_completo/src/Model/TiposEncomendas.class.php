<?php
namespace Model;

use View\Mensagem;

/**
 * Classe para manipulação dos Tipos de Encomendas, armazenados no XML
 * 
 * @package Model
 */
class TiposEncomendas
{	
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
		$this->arquivo = __DIR__ . '/../../data/tipos_encomendas.xml';

		// Carregando arquivo XML
		# Capitulo 3 - Laboratorio 1
		$obj_SimpleXML = new \SimpleXMLElement($this->arquivo, null, true);
		
		// Ler atributos do XML
		# Capitulo 3 - Laboratorio 1
		$atributos = $obj_SimpleXML->attributes();
		$this->ultimo_id = (int) $atributos->ultimo_id;
		
		// Para cada elemento da SimpleXML
		foreach( $obj_SimpleXML as $tipo ) {
			// Converter em objeto stdClass
		    $elemento = $this->converterXML2Std( $tipo );
		    
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
		# Capitulo 3 - Laboratorio 1
		$obj_SimpleXML = new \SimpleXMLElement($this->arquivo, null, true);
		
		// Atualizando atributo ultimo_id
		# Capitulo 3 - Laboratorio 1
		$obj_SimpleXML->attributes()->ultimo_id = $this->ultimo_id;
		
		// Limpa XML
		# Capitulo 3 - Laboratorio 1
		unset( $obj_SimpleXML->tipo );
		
		foreach( $this->elementos_XML as $obj ) {
			// Criando elemento <tipo> em <tipos>
			# Capitulo 3 - Laboratorio 1
			$elemento = $obj_SimpleXML->addChild('tipo'); 

			// Criando atributos id, dt_criacao e dt_edicao em <tipo>
			# Capitulo 3 - Laboratorio 1
			$elemento->addAttribute('id', $obj->id);
			$elemento->addAttribute('dt_criacao', $obj->dt_criacao );
			$elemento->addAttribute('dt_edicao', $obj->dt_edicao );
			
			// Criando elementos <nome>, <valor> e <prazo> em <tipo>
			# Capitulo 3 - Laboratorio 1
			$elemento->addChild('nome', $obj->nome);
			$elemento->addChild('valor', $obj->valor);
			$elemento->addChild('prazo', $obj->prazo);
		}
		
		// Salvando XML no arquivo
		# Capitulo 3 - Laboratorio 1
		$obj_SimpleXML->asXML( $this->arquivo );
	}
	
	/**
	 * Converte SimpleXML para stdClass
	 * 
	 * @param \SimpleXMLElement $obj
	 * 
	 * @return \stdClass
	 */
	private function converterXML2Std( \SimpleXMLElement $elemento )
	{
		// criando objeto com informacoes
		$obj_std = new \stdClass();
		
		// recuperando atributos
		# Capitulo 3 - Laboratorio 1
		$atributos = $elemento->attributes();
		
		// Alimentando objeto stdClass
		$obj_std->id         = $atributos->id;			# Capitulo 3 - Laboratorio 1
		$obj_std->dt_criacao = $atributos->dt_criacao;	# Capitulo 3 - Laboratorio 1
		$obj_std->dt_edicao  = $atributos->dt_edicao;	# Capitulo 3 - Laboratorio 1
		
		$obj_std->nome  = $elemento->nome;				# Capitulo 3 - Laboratorio 1
		$obj_std->valor = $elemento->valor;				# Capitulo 3 - Laboratorio 1
		$obj_std->prazo = $elemento->prazo;				# Capitulo 3 - Laboratorio 1
		
		return $obj_std;
	}
		
	/**
	 * Gerenciar Tipos de Encomendas
	 * 
	 * @return \stdClass
	 */
	public function gerenciar()
	{
		return $this->elementos_XML;
	}

	/**
	 * Listar Tipos de Encomendas
	 *
	 * @return \stdClass
	 */
	public function listar()
	{
		return $this->elementos_XML;
	}
	
	/**
	 * Excluir Tipos de Encomendas
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
		
		@header('Location: admin.php?modulo=TiposEncomendas&acao=gerenciar');		
	}
	
	/**
	 * Editar Tipos de Encomendas
	 * 
	 * @return void
	 */
	public function editar()
	{
		if( $this->salvar() ) {
			@header('Location: admin.php?modulo=TiposEncomendas&acao=gerenciar');
		}
		
		return $this->elementos_XML[ $_GET['id'] ];
	}
	
	/**
	 * Inserir Tipos de Encomendas
	 * 
	 * @return void
	 */
	public function inserir()
	{
		if( $this->salvar() ) {
			@header('Location: admin.php?modulo=TiposEncomendas&acao=gerenciar');
		}
		
		return array();
	}
	
	/** 
	 * Salvar Tipos de Encomendas
	 * 
	 * @return boolean
	 */
	private function salvar()
	{
		if( $_POST ) {
		    
		    // Verifica se todos os campos foram preenchidos
		    if( is_bool( array_search('', $_POST) ) ) {
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
    			
    			$registro->nome  = $_POST['nome'];
    			$registro->valor = $_POST['valor'];
    			$registro->prazo = $_POST['prazo'];
    
    			$this->gravarArquivo();
    			
    			Mensagem::set("Cadastro salvo com sucesso!", 'success');
    			
    			return true;
			} else {
				Mensagem::set("Todos os campos do formulário são obrigatórios", 'error');
			}    			
		}
		
		return false;		
	}
	
}
