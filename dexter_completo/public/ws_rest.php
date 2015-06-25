<?php
use Model\TiposEncomendas;

// Inclusao do arquivo de bootstrap
require __DIR__ . '/../bootstrap.php';

# Capitulo 4 - Laboratorio 1

// se requisicao POST
if( $_POST ) {
	$dados = $_POST;
}
elseif( $_GET ) {
	$dados = $_GET;
}
else {
	$dados = null;
}


// variavel para controle de erro
$erro = false;


// validar se há informaçoes na superglobal GET
if( $dados ) {

	switch ( $dados['acao'] ) {
		case 'te_consultar':
		    $TiposEncomendas = new TiposEncomendas();
	            
	        $resultado = array();
	            
	        foreach( $TiposEncomendas->listar() as $TipoEncomenda ) {
	            $resultado[] = array( 'id'    => (string) $TipoEncomenda->id,
	            					  'nome'  => (string) $TipoEncomenda->nome,
	                                  'valor' => (string) $TipoEncomenda->valor,
	                                  'prazo' => (string) $TipoEncomenda->prazo );
	        }
	        
	        // tratando retorno
	        switch( $dados['retorno'] ) {
	        	case 'json':
	        		header('Content-type: application/json');
	        		echo json_encode( $resultado );	        		
	        		break;
	        		
	        	case 'xml':
	        		header('Content-type: application/xml');
	        		
	        		$xml = new SimpleXMLElement('<TiposEncomendas/>');
	        		
	        		foreach( $resultado as $registro ) {
	        			$tipo_encomenda = $xml->addChild('TipoEncomenda');
	        			
	        			$tipo_encomenda->addChild('id',    $registro['id']);
	        			$tipo_encomenda->addChild('nome',  $registro['nome']);
	        			$tipo_encomenda->addChild('valor', $registro['valor']);
	        			$tipo_encomenda->addChild('prazo', $registro['prazo']);
	        		}
	        		
	        		echo $xml->asXML();
	        		break;
	        		
	        	default:
	        		die('Tipo de retorno não especificado');
	        }   
	   		break;
	   	
	   	default:
	   		die( 'Ação não existe!' );	   		
	}
		
} else {
	die( 'Requisição inválida!' );
}