<?php
  require_once('functions.php');
  if (isset($_POST['includeCustomer']) && isset($_POST['courseId'])){
    findElementByColumn('tbl_customers', 'name_var', $_POST['includeCustomer']);
    $customer = array(
        'tbl_courses_id' => $_POST['courseId'],
        'tbl_courses_name_var' =>  '',
        'tbl_customers_id' => $element['id'],
        'tbl_customers_name_var' => $element['name_var'],
        'payment_tni' => 0,
        );
    search($_POST['courseId']);
    $customer['tbl_courses_name_var'] = $courses['name_var'];
    addCourseCustomer($customer);
  } else {
    die("ERRO: ID não definido.");
  }
?>