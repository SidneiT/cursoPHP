<?php
echo '<pre>';
echo 'CONSUMINDO WEBSERVICE - RETORNO XML <br>';

$consulta_xml = file_get_contents( 'http://localhost/exemplos_aula/Capitulo4/rest/servico.php?retorno=xml&operacao=soma&num_a=10&num_b=10.4' );

$objeto_xml = new SimpleXMLElement( $consulta_xml );

print_r( $objeto_xml );

echo '<br>';

echo "Operacao : {$objeto_xml->operacao} <br>";
echo "Num A : {$objeto_xml->num_a} <br>";
echo "Num B : {$objeto_xml->num_b} <br>";
echo "Resultado : {$objeto_xml->resultado} <br>";



echo '<hr>';
echo 'CONSUMINDO WEBSERVICE - RETORNO JSON <br>';

$consulta_json = file_get_contents( 'http://localhost/exemplos_aula/Capitulo4/rest/servico.php?retorno=json&operacao=multiplicao&num_a=10&num_b=3' );

echo " <br>$consulta_json <br><br>";

// converter o json
$json_convertido = json_decode( $consulta_json );

echo "Operacao : {$json_convertido->operacao} <br>";
echo "Num A : {$json_convertido->num_a} <br>";
echo "Num B : {$json_convertido->num_b} <br>";
echo "Resultado : {$json_convertido->resultado} <br>";