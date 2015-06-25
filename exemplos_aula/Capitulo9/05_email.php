<?php

if( count($_POST) ) {
  
  if( filter_var( $_POST['de'], FILTER_VALIDATE_EMAIL ) ) {
    $mensagem_enviada = mail('thiago.oliveira@4linux.com.br', // para
                             'Assunto Mensagem',
                             'Corpo da mensagem',
                             "From: {$_POST['de']}\n");
    if( $mensagem_enviada ) {
      echo "Mensagem enviada com sucesso!";
    }
  } else {
    echo "Valor de email informado, nao e valido!!!";
  }
}
?>
<form action="" method="POST">
  De : <input type="text" name="de" /> <br>
  <input type="submit" value="Enviar" />
</form>
