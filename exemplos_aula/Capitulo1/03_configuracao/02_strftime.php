<?php
// Setando locale
setlocale(LC_ALL, 'pt_BR.utf8' );

// Exibindo o horário em pt-BR
echo strftime( '%A, %e %B %Y' );


echo '<hr>';

// Setando locale
setlocale(LC_ALL, 'en_US.utf8' );

// Exibindo o horário em en-US (ingles)
echo strftime( '%A, %e %B %Y' );


echo '<hr>';

// Setando locale
setlocale(LC_ALL, 'de_DE.utf8' );

// Exibindo o horário em de-DE (alemão)
echo strftime( '%A, %e %B %Y' );