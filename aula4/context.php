<?php

$posts =  array
(
	"nCdEmpresa"    	  => "",
	"sDsSenha"	    	  => "",
	"nCdServico"    	  => "",
	"sCepOrigem"    	  => "",
	"sCepDestino"   	  => "",
	"nVlPeso"			  => "",
	"nCdFormato"		  => "",
	"nVlComprimento" 	  => "",
	"nVlAltra"		 	  => "",
	"nVlLargura"	 	  => "",
	"nVlDiametro"	 	  => "",
	"sCdMaoPropria"		  => "",
	"nVlValorDeclarado"	  => "",
	"sCdAvisoRecebimento" => ""
				
);

$stream = array (
		'http' => array (
				'method' => 'POST',
				'header' => 'Content-type: application/x-www-form-urlenconded\r\n',
				'content' => http_build_query ( $posts ) 
		) 
);