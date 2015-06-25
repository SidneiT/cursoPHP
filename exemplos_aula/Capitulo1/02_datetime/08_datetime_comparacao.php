<?php
echo '<pre>';

// Criando objeto da classe DateTime,
// baseado na data atual
$obj_1 = new DateTime();



// Criando objeto da classe DateTime,
// baseado na data: 18/12/1991
$obj_2 = new DateTime( '1991-12-18' );



// Comparando datas
var_dump( $obj_1 > $obj_2 );

echo '<hr>';

var_dump( $obj_1 < $obj_2 );

echo '<hr>';

var_dump( $obj_1 == $obj_2 );