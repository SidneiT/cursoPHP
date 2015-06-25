<?php
// abrir session
session_start();

$_SESSION['token_csrf'] = md5( date('Y-m-dH-i-s') );

?>

<form action="02_csrf_processar.php" method="POST">
  Nome: <input type="text" name="nome" /> <br>
  Email: <input type="text" name="email" /> <br>

  <br>
  <!-- 
  deve ser um campo type="hidden" 
  para nossos testes, mantive o campo visivel
  -->
  <input type="text" name="token_csrf" 
         value="<?php echo $_SESSION['token_csrf']; ?>"/>   
  <br>

  <input type="submit" value="Enviar" />

</form>
