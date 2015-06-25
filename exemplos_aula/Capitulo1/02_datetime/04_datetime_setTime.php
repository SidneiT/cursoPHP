<?php
echo '<pre>';

// Criando objeto da classe DateTime 
// baseado na data e hora atual

$obj = new DateTime();

print_r( $obj );


// Modificando o horário, para 12:00:00
$obj->setTime(12, 0, 0);

print_r( $obj );


echo '<hr>';

// Formatando a saida
echo $obj->format('d/m/Y H:i:s');