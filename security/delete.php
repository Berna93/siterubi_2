<?php
  require_once('functions.php');
  require_once('../session.php');
  if (isset($_GET['id'])){
    delete($_GET['id']);
  } else {
    die("ERRO: ID não definido.");
  }
?>