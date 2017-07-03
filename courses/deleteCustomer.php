<?php
  require_once('functions.php');
  var_dump($_GET);
  if (isset($_GET['id']) && isset($_GET['courseId'])){
    deleteCustomer($_GET['id'],$_GET['courseId']);
  } else {
    die("ERRO: ID não definido.");
  }
?>