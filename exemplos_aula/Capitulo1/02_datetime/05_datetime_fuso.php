<?php
echo '<pre>';

// Criando objeto da classe DateTime 
// baseado na data e hora atual
$obj = new DateTime();

print_r( $obj );



// determinando o fuso (ou timezone)
$novo_fuso = new DateTimeZone( 'America/New_York' );



// Setando o novo timezone ao objeto DateTime
$obj->setTimezone( $novo_fuso );

print_r( $obj );


echo '<hr>';

// Formatando a saida
echo $obj->format('d/m/Y H:i:s');