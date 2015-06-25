<?php
echo '<pre>';

// Criando objeto da classe DateTime,
// baseado na data atual
$obj_datetime = new DateTime();

print_r( $obj_datetime );



// Criando objeto da classe DateInterval,
// com periodo de: 2 meses 20 dias
$obj_dateinterval = new DateInterval( 'P2M20D' );



// adicionando periodo de data
$obj_datetime->add( $obj_dateinterval );

print_r( $obj_datetime );