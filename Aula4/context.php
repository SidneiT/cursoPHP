<?php
$opts = array (
		'http' => array (
				"method" => "POST",
				"header" => "Content-type: application/x-www-form-urlencoded\r\n",
				"content" => http_build_query ( array(
						"nCdEmpresa" 			=> "",
						"sDsSenha" 				=> "",
						"nCdServico" 			=> "40010",
						"sCepOrigem" 			=> "09940580",
						"sCepDestino" 			=> "09941250",
						"nVlPeso" 				=> "1",
						"nCdFormato" 			=> 1,
						"nVlComprimento" 		=> 20,
						"nVlAltura" 				=> 20,
						"nVlLargura" 			=> 20,
						"nVlDiametro" 			=> 20,
						"sCdMaoPropria" 		=> "S",
						"nVlValorDeclarado" 	=> "25",
						"sCdAvisoRecebimento" 	=> "S" 
						)
				 ) 
		) 
);

$contexto = stream_context_create ( $opts );

$result = file_get_contents ('http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx/CalcPrecoPrazo', false, $contexto );

$xml = new SimpleXMLElement ( $result );

var_dump ( $xml );

