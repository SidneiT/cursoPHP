<?php
$opts = array (
        'http' => array (
                'method' => 'POST',
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query ( array (
                        'nCdEmpresa'             => "",
                        'sDsSenha'                 => "",
                        'nCdServico'             => "40010",
                        'sCepOrigem'             => "09941250",
                        'sCepDestino'             => "09940580",
                        'nVlPeso'                => "1",
                        'nCdFormato'            => 1,
                        'nVlComprimento'        => 20.5,
                        'nVlAltura'                => 20.0,
                        'nVlLargura'            => 15.0,
                        'nVlDiametro'            => 0.0,
                        'sCdMaoPropria'            => "S",
                        'nVlValorDeclarado'        => "10",
                        'sCdAvisoRecebimento'    => "S"
                    )

                 )
        )
);

$contexto = stream_context_create ( $opts );
$result = file_get_contents ( 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrecoPrazo', false, $contexto );

$xml = new SimpleXMLElement($result);

header("Content-type: text/xml");

echo $xml->asXML();