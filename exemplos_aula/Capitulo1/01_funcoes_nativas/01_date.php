<?php
// exibindo data e hora do sistema no formato d/m/Y H:i:s, onde:
// d: dia com 2 digitos 01 a 31
// m: mes com 2 digitos 01 a 12
// Y: ano com 4 digitos
// H: hora com 2 digitos de 00 a 23
// i: minuto com 2 digitos de 00 a 59
// s: segundos com 2 digitos de 00 a 59

echo date( 'd/m/Y H:i:s' ); // 28/11/2013 17:36:40

echo '<hr>';

// exibindo data e hora baseado em um timestamp no formato d/m/Y H:i:s

echo date( 'd/m/Y H:i:s', 100000 );