<?php
setlocale(LC_ALL, 'pt_BR.utf8');

echo strftime("%A, %e de %B de %Y");

echo "<br>";

$date = new DateTime("+1 year");

echo $date->format("d-m-Y");

echo "<br>";

$date->modify("-10 years");

echo $date->format("D M y");

echo "<br>";

$date->setDate("1990",8,1);

echo $date->format("D M y");

echo "<br>";

$date->setTime(9, 15, 45);

echo $date->format("H i s");

echo "<hr>";

###############

'2015-03-01';
'2015-04-03';



