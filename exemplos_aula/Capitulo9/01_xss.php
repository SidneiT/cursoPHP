<?php

// simulando um conteudo enviado pelo usuario
// por um campo comentario
$post = "<script>alert('Oi!!!')</script><b>
Hahahaha</b>";

// a informaçao acima podemos supor que 
// estava armazenada em um BD

// ao exibir...
echo 'Eis a supresa: <br>';
echo $post;

echo '<hr>';
echo 'Tratando informação: <br>';

// removendo qualquer tag HTML que possa causar algum problema
echo strip_tags( $post, '<b>' );
