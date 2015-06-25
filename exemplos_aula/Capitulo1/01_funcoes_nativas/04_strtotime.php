<?php
// convertendo uma string no formato de data em timestamp

// Total de segundos atual, equivalente a 
// data e hora desde o inicio da era UNIX
echo strtotime("now");

echo '<hr>';

// Total de segundos equivalente a proxima 
// segunda-feira a partir da data e hora desde 
// o inicio da era UNIX
echo strtotime("next Monday");

echo '<hr>';



// Enriquecendo o exemplo:

echo date( 'd/m/Y H:i:s', strtotime("now") );

echo '<hr>';

echo date( 'd/m/Y H:i:s', strtotime("next Monday") );