<?php
require_once('../config.php');
require_once(DBAPI);
$courses = null;
$course = null;
$courseCustomers = null;
$courseCustomer = null;
/**
 *  Listagem de Clientes
 */
function index() {
    global $courses;
    $courses = find_all('tbl_courses');
}

function indexCourseCustomers($column = null, $value = null) {
  global $courseCustomers;
  $courseCustomers = findByColumn('tbl_course_customers', $column, $value);
}

function search($id = null) {
    global $courses;
    $courses = find('tbl_courses', $id);
}

/**
 *  Cadastro de Clientes
 */
function add() {
  if (!empty($_POST['course'])) {

    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $course = $_POST['customer'];
    $course['modification_date_dt'] = $course['creation_date_dt'] = $today->format("Y-m-d H:i:s");

    save('tbl_courses', $course);
    header('location: add_course.php');
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
      header('location: edit_course.php?id=' + $id);
    } else {
      global $course;
      $course = find('tbl_courses', $id);
      header('location: edit_course.php?id=' + $id);
    }
  } else {
    header('location: edit_course.php?id=' + $id);
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