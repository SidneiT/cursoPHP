<?php
/**
 * Teste 1:
 * Login = admin
 * Senha = ' OR '1' = '1   
 *
 * Teste 2:
 * Login = admin' #
 * Senha = 3241341234234234
 */


if( count($_POST) ) {
  $mysql = mysql_connect('localhost', 'dexter', '123456');
  mysql_select_db('dexter');
  
  
  // Código que permite injection
  $sql = "SELECT * FROM funcionarios "
       . "WHERE email = '{$_POST['email']}' " 
       . "AND senha = '{$_POST['senha']}' ";
  
  $resultado = mysql_query( $sql );

  $retorno = array();
  while( $dados = mysql_fetch_array( $resultado ) ) {
    $retorno[] = $dados;
  }
  

  /*
  # Solução 1
  $usuario = mysql_escape_string( $_POST['email'] );
  $senha   = mysql_escape_string( $_POST['senha'] );

  $sql = "SELECT * FROM usuarios "
       . "WHERE login = '$usuario' " 
       . "AND senha = '$senha' ";
  
  $resultado = mysql_query( $sql );

  $retorno = array();
  while( $dados = mysql_fetch_array( $resultado ) ) {
    $retorno[] = $dados;
  }
  */

  /*
  # solução dois com PDO
  $pdo = new PDO('mysql:host=localhost;dbname=dexter',
                 'dexter',
                 '123456' );

  $sql = 'SELECT * FROM usuarios WHERE login = ? AND senha = ?';

  $stmt = $pdo->prepare( $sql );
  $stmt->execute( array( $_POST['email'], $_POST['senha'] ) );
 
  $retorno = $stmt->fetchAll();
  */
  echo '<pre>';
  echo "$sql <br><br>";
  print_r( $retorno );
}
?>

<form action="" method="POST">
  Email: <input type="text" name="email" />
  Senha: <input type="text" name="senha" />
  <input type="submit" value="Entrar" />
</form>
