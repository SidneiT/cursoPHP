<?php
echo '<pre>';

// Criando objeto da classe DateInterval 
// com periodo de: 3 dias
$obj = new DateInterval( 'P3D' );

print_r( $obj );


echo '<hr>';
// Criando objeto da classe DateInterval
// com periodo de: 3 meses
$obj = new DateInterval( 'P3M' );

print_r( $obj );


echo '<hr>';
// Criando objeto da classe DateInterval
// com periodo de: 3 dias e 2 horas
$obj = new DateInterval( 'P3DT2H' );

print_r( $obj );


echo '<hr>';