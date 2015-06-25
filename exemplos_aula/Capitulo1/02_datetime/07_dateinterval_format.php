<?php
echo '<pre>';

// Criando objeto da classe DateInterval
// com periodo de: 1 ano, 10 meses, 3 dias, 2 horas e 35 minutos
$obj = new DateInterval( 'P1Y10M3DT2H35M' );

print_r( $obj );

echo '<hr>';


// Formatando o periodo
echo $obj->format('%y ano(s), %m mes(es), %d dia(s), '
		.'%h hora(s), %i minuto(s) e %s segundo(s)');