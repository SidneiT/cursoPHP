<?php
echo '<pre>';

// Criando objeto da classe DateTime 
// baseado na data e hora atual

$obj = new DateTime();

print_r( $obj );


// Modificando a data atual, para 18/12/1991
$obj->setDate(1991, 12, 18);

print_r( $obj );


echo '<hr>';

// Formatando a saida
echo $obj->format('d/m/Y H:i:s');