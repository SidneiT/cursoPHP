<?php
echo '<pre>';

// Setando fuso horario para execução
date_default_timezone_set('Europe/Paris');

// Exibindo o horário com Date
echo date('d/m/Y H:i:s');

echo '<hr>';

// exibindo horário com DateTime
$obj_date = new DateTime();

print_r( $obj_date );