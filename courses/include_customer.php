<?php
  require_once('functions.php');
  if (isset($_POST['incluirCliente'])){
    findElementByColumn('tbl_customers', 'name_var', $_POST['incluirCliente']);
    $customer = array(
        'tbl_courses_id' => $_POST['courseId'],
        'tbl_courses_name_var' =>  'Astrologia',
        'tbl_customers_id' => $element['id'],
        'tbl_customers_name_var' => $element['name_var'],
        'payment_tni' => 0,
        );
    addCourseCustomer($customer);
  } else {
    die("ERRO: ID não definido.");
  }
?>