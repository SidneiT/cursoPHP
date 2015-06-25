<?php
echo '<pre>';

// Criando objeto da classe DateTime,
// baseado na data atual
$obj_data_atual = new DateTime();



// Criando objeto da classe DateTime,
// baseado na data nascimento: 18/12/1991
$obj_data_nascimento = new DateTime( '1991-12-18' );



// Calculando diferenda entre as datas
// será retornado um objeto da classe DateInterval
$diferenca = $obj_data_atual->diff( $obj_data_nascimento );



// Formatando o periodo
echo $diferenca->format('%y ano(s), %m mes(es), %d dia(s), '
		.'%h hora(s), %i minuto(s) e %s segundo(s)');