<?php
echo '<pre>';

// Criando objeto da classe DateTime 
// baseado na data e hora atual

$obj = new DateTime();

print_r( $obj );


// Modificando a data atual, acrescentando 3 meses e 2 horas
$obj->modify('+3 month +2 hour');

print_r( $obj );


echo '<hr>';

// Formatando a saida
echo $obj->format('d/m/Y H:i:s');