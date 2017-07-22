<?php
require_once('../config.php');
require_once(DBAPI);
$courses = null;
$course = null;
$courseCustomers = null;
$courseCustomer = null;
$element = null;
$elements = null;
/**
 *  Listagem de Clientes
 */
function index() {
    global $courses;
    $courses = find_course_all();
}

function indexCourseCustomers($column = null, $value = null) {
  global $courseCustomers;
  $courseCustomers = findByColumnNumber('tbl_course_customers', $column, $value);
}

function searchByCourseId($id = null) {
  global $courseCustomers;
  $results = find_course_customers_by_courseid($id);

  $courseCustomers = array();
  foreach($results as $result) {
    $courseCustomers[] = $result;
  }
}

function findElementByColumn($table = null , $column = null, $value = null) {
  global $element;
  $element  = findByColumn($table, $column, $value);
}

function findElementByColumnNumber($table = null , $column = null, $value = null) {
  global $elements;
  $elements  = findByColumnNumber($table, $column, $value);
}

function search($id = null) {
    global $courses;
    $results = find_course_by_id($id);

    foreach($results as $result) {
        $courses = $result;
    }
}

function searchById($table = null, $id = null) {
   global $element;
   $element = find($table, $id);
}

/**
 *  Cadastro de Cursos
 */
function add() {
  if (!empty($_POST['course'])) {

    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $course = $_POST['course'];
    $course['modification_date_dt'] = $course['creation_date_dt'] = $today->format("Y-m-d H:i:s");

    save('tbl_courses', $course);
    header('location: add_course.php');
    die();
  }
}

/**
 *  Cadastro de Cliente em Curso
 */
function addCourseCustomer($customer = null) {
  if (!empty($customer)) {

    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $customer['modification_date_dt'] = $customer['creation_date_dt'] = $today->format("Y-m-d H:i:s");

    save('tbl_course_customers', $customer);
    header('location: view_course_customers.php?id=' . $customer['tbl_courses_id']);
  }
}



/**
 *  Atualizacao/Edicao de Cliente
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['course'])) {
      $course = $_POST['course'];
      $course['modification_date_dt'] = $now->format("Y-m-d H:i:s");
      update('tbl_courses', $id, $course);
      //header('location: edit_course.php?id=' + $id);
      header('location: view_course.php');
      die();
    } else {
      global $course;
      $course = find('tbl_courses', $id);

    }
  } else {
  }
}

/**
 *  Atualizacao/Edicao de Cliente
 */
function editNumSlots($course = null) {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($course)) {
      $course['modification_date_dt'] = $now->format("Y-m-d H:i:s");
      update('tbl_courses', $course['id'], $course);
  }
}

/**
 *  Atualizacao/Edicao de Cliente
 */
function editPayment($courseCustomer) {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (!empty($courseCustomer)) {
      $courseCustomer['modification_date_dt'] = $now->format("Y-m-d H:i:s");
      update('tbl_course_customers', $courseCustomer['id'], $courseCustomer);
      header('location: view_course_customers.php?id=' . $courseCustomer['tbl_courses_id']);
    } else {

    }
}

/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {
  global $course;
  $course = remove('tbl_courses', $id);
  header('location: view_course.php');
}

/**
 *  Fechamento de um Curso
 */
function close($id = null) {
  $course = find('tbl_courses', $id);
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  var_dump($course);
  if(isset($course)) {
    $course['status_var'] = 'Fechado';
    $course['modification_date_dt'] = $now->format("Y-m-d H:i:s");
    update('tbl_courses', $course['id'], $course);
    header('location: view_course.php');
  }

}

/**
 *  Exclusão de um Cliente
 */
function deleteCustomer($id = null, $courseId = null) {
  global $customer;
  $customer = remove('tbl_course_customers', $id);
  header('location: view_course_customers.php?id=' . $courseId);
}