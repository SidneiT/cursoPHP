<?php
// Gerando o timestamp

// Gerando timestamp da data 03/09/2012 18:30:00
echo mktime(18, 30, 0, 9, 3, 2012);

echo '<hr>';

// Enriquecendo o exemplo:

echo date( 'd/m/Y H:i:s', mktime(18, 30, 0, 9, 3, 2012) );