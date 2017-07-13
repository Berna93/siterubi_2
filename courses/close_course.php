<?php
  require_once('functions.php');
  if (isset($_GET['id'])){
    close($_GET['id']);
  } else {
    die("ERRO: ID não definido.");
  }
?>