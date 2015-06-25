<?php
ini_set('soap.wsdl_cache_enabled','0');

class WsCalc
{
	public function soma($num_a, $num_b)
	{
		return $num_a + $num_b;
	}

	public function subtracao($num_a, $num_b)
	{
		return $num_a - $num_b;
	}

	public function multiplicacao($num_a, $num_b)
	{
		return $num_a * $num_b;
	}
}


$servidor_soap = new SoapServer('wscalc.wsdl');

// Criar um instancia da WsCalc
$obj_wscalc = new WsCalc();

// 'registrar' o objeto WsCalc no servidor_soap
$servidor_soap->setObject( $obj_wscalc );

$servidor_soap->handle();