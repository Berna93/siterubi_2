<?php
  require_once('functions.php');
  var_dump($_POST);
  if (isset($_POST['includeCustomer']) && isset($_POST['courseId']) && isset($_POST['courseName'])){
    findElementByColumn('tbl_customers', 'name_var', $_POST['includeCustomer']);
    $customer = array(
        'tbl_courses_id' => $_POST['courseId'],
        'tbl_courses_name_var' =>  $_POST['courseName'],
        'tbl_customers_id' => $element['id'],
        'tbl_customers_name_var' => $element['name_var'],
        'payment_tni' => 0,
        );
    addCourseCustomer($customer);
  } else {
    die("ERRO: ID não definido.");
  }
?>