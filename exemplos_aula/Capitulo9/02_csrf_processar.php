<?php
// 02_csrf_processar.php

// validar a $_POST
if( count( $_POST ) ) {

  // abrir session
  session_start();

  if( $_SESSION['token_csrf'] == $_POST['token_csrf'] ) {
    echo "Origem das informações é válida!";
    unset( $_SESSION['token_csrf'] );
  } else {
    echo "Nao pode realizar o post! =D";
  }

}
