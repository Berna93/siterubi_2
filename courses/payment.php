<?php
  require_once('functions.php');
  if (isset($_GET['id']) && isset($_GET['payment'])){
    searchById('tbl_course_customers', $_GET['id']);
    $customer = $element;
    if($_GET['payment']==0) {
      $customer['payment_tni'] = 1;
    } else {
      $customer['payment_tni'] = 0;
    }

    editPayment($customer);
  } else {
    die("ERRO: ID não definido.");
  }
?>