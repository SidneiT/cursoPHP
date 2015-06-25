<?php

namespace Controller;

use View\View;
use Model\Perfis;

/**
 * Controller da aplicacao
 * 
 * Camada responsavel pelo fluxo da aplicacao
 *
 * @package View
 */
final class Controller 
{
	
	/**
	 * Construtor
	 * 
	 * @param string $tipo
	 * 
	 * @throws \Exception
	 */
  	public function __construct( $tipo ) 
  	{
  		
		// se existir $_GET['modulo']
    	if( isset( $_GET['modulo'] ) ) {

    		// concatenando o Namespace das Models ao valor $_GET
    		$modulo    = "\Model\\{$_GET['modulo']}";

      		// verificar se a classe existe
      		if( class_exists( $modulo ) ) {
      			
      			$model_obj = new $modulo();

      			// se existir $_GET['acao']
        		if( isset( $_GET['acao'] ) ) {
        			
        			if( $tipo == Perfis::ADMINISTRATIVO && $_GET['acao'] != 'logar' ){
        				if( !isset( $_SESSION['funcionarios'] ) ) {
        					header( 'Location: admin.php' );
        				}
        			}        			
        			
        			$acao = $_GET['acao'];
        			
            		$dados    = $model_obj->$acao();
            		$template = "{$_GET['modulo']}/{$acao}";
          			          			
				} else {
					throw new \Exception( "Acao deve ser informada!" );
        		}
        	} else {
        		throw new \Exception( "Model '{$_GET['modulo']}' nao encontrada!" );
      		}
      		
      		return View::carregar($tipo, strtolower( $template ), $dados);
      		
      	} else {
      		// exibicao padrao
			return View::carregar($tipo, 'index');
       	}		
  	}  	
}