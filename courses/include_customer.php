<?php
  require_once('functions.php');
  require_once('../session.php');
  if (isset($_POST['includeCustomer']) && isset($_POST['courseId'])){
    //findElementByColumn('tbl_customers', 'name_var', $_POST['includeCustomer']);
    findCustomerByName($_POST['includeCustomer']);
    $customer = array(
        'tbl_courses_id' => $_POST['courseId'],
        'tbl_courses_name_var' =>  '',
        'tbl_customers_id' => $element['id'],
        'tbl_customers_name_var' => $element['name_var'],
        'payment_tni' => 0,
        );
    search($_POST['courseId']);
    $customer['tbl_courses_name_var'] = $courses['name_var'];
    //indexCourseCustomers('tbl_courses_id', $customer['tbl_courses_id']);
    searchByCourseId($customer['tbl_courses_id']);
    $foundKey = array_search($customer['tbl_customers_name_var'],array_column($courseCustomers, 'tbl_customers_name_var'));
    $course = $courses;
    $newSlots = intval($courses['numSlotsTaken_int'])+1;

    if($foundKey===false) {
       //Se curso ja estiver lotado, nao insere e avisa o usuario
       if($newSlots <= $courses['numSlots_int']) {
          $course['numSlotsTaken_int'] = $newSlots;
          editNumSlots($course);
          addCourseCustomer($customer);
       } else {
         $_SESSION['message'] = 'Não foi possível realizar esta operação. Curso lotado!';
         $_SESSION['type'] = 'danger';
         header('location: view_course_customers.php?id=' . $customer['tbl_courses_id']);
       }

    } else {
       $_SESSION['message'] = 'Não foi possível realizar esta operação. Cliente já inserido neste curso.';
       $_SESSION['type'] = 'danger';
       header('location: view_course_customers.php?id=' . $customer['tbl_courses_id']);
    }

  } else {
    die("ERRO: ID não definido.");
  }
?>