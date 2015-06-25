<?php
echo '<pre>';

// Criando objeto da classe DateTime 
// baseado na data e hora atual

$obj = new DateTime();

print_r( $obj );

echo '<hr>';




// Criando objeto da classe DateTime 
// baseado em uma string com data em ingles

$obj = new DateTime('next Sunday');

print_r( $obj );

echo '<hr>';




// Criando objeto da classe DateTime 
// baseado em uma string com data e hora

$obj = new DateTime('2004-10-19 17:05:00');

print_r( $obj );