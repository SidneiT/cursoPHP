<?php
// variavel para controle de erro
$erro = false;

// formato padrao de retorno
$tipo_retorno = 'xml';

// validar se há informaçoes na superglobal GET
if (count ( $_GET )) {
	
	// existe elemento (ou indice) 'operacao'
	if (isset ( $_GET ['operacao'] ) && isset ( $_GET ['num_a'] ) && isset ( $_GET ['num_b'] )) {
		
		// verificando se num_a e num_b são numericos
		if (is_numeric ( $_GET ['num_a'] ) && is_numeric ( $_GET ['num_b'] )) {
			
			// realizando a operacao aritmetica
			switch (strtolower ( $_GET ['operacao'] )) {
				case 'soma' :
					$resultado = $_GET ['num_a'] + $_GET ['num_b'];
					break;
				
				case 'subtracao' :
					$resultado = $_GET ['num_a'] - $_GET ['num_b'];
					break;
				
				case 'divisao' :
					if ($_GET ['num_b'] == 0) {
						$erro = true;
						$mensagem = "Divisao por zero.";
					} else {
						$resultado = $_GET ['num_a'] / $_GET ['num_b'];
					}
					break;
				
				case 'multiplicao' :
					$resultado = $_GET ['num_a'] * $_GET ['num_b'];
					break;
				
				default :
					$erro = true;
					$mensagem = "Operacao '{$_GET['operacao']}' invalida!";
			}
		} else {
			$erro = true;
			$mensagem = "Valores informados precisam ser numericos.";
		}
	} else {
		$erro = true;
		$mensagem = "Parametros necessarios: 'operacao', 'num_a' e 'num_b'.";
	}
} else {
	$erro = true;
	$mensagem = "Requisição inválida!";
}

// tratando forma de retorno
if (isset ( $_GET ['retorno'] )) {
	
	$valor_retorno = strtolower ( $_GET ['retorno'] );
	
	if (in_array ( $valor_retorno, array (
			'xml',
			'json',
			'serial' 
	) )) {
		$tipo_retorno = $valor_retorno;
	}
}

switch ($tipo_retorno) {
	case 'xml' :
		// preparando para gerar o XML de retorno
		$dom = new DomDocument ( '1.0', 'UTF-8' );
		$dom->formatOutput = true;
		
		// criando elemento raiz <wscalc>
		$elemento_raiz = $dom->createElement ( 'wscalc' );
		$elemento_wscalc = $dom->appendChild ( $elemento_raiz );
		
		// verificar se ocorreu algum erro
		if ($erro) {
			$elemento_erro = $dom->createElement ( 'erro' );
			$conteudo_erro = $dom->createTextNode ( $mensagem );
			$elemento_erro->appendChild ( $conteudo_erro );
			$elemento_wscalc->appendChild ( $elemento_erro );
		} else {
			
			// acrescentar ao XML os parametros da operacao
			foreach ( $_GET as $parametro => $valor ) {
				if (in_array ( $parametro, array (
						'operacao',
						'num_a',
						'num_b' 
				) )) {
					$param = $dom->createElement ( $parametro );
					$valor = $dom->createTextNode ( $valor );
					$param->appendChild ( $valor );
					$elemento_wscalc->appendChild ( $param ); // <------
				}
			}
			
			// acrescentar o resultado
			$result = $dom->createElement ( 'resultado' );
			$valor = $dom->createTextNode ( $resultado );
			$result->appendChild ( $valor );
			$elemento_wscalc->appendChild ( $result );
		}
		
		// exibindo XML gerado
		// echo '<pre>';
		// echo htmlentities( $dom->saveXML() );
		echo $dom->saveXML ();
		break;
	
	case 'json' :
		// retorno json
		$retorno = array ();
		
		if ($erro) {
			$retorno ['erro'] = $mensagem;
		} else {
			foreach ( $_GET as $parametro => $valor ) {
				if (in_array ( $parametro, array (
						'operacao',
						'num_a',
						'num_b' 
				) )) {
					$retorno [$parametro] = $valor;
				}
			}
			
			// acrescentar resultado da operacao
			$retorno ['resultado'] = $resultado;
		}
		
		if ($tipo_retorno == 'json') {
			// imprimindo o json
			echo json_encode ( $retorno );
		} else {
			// serializa o array
			echo serialize ( $retorno );
		}
		break;
}