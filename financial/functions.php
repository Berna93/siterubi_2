<?php
require_once('../config.php');
require_once(DBAPI);
$costs = null;
$cost = null;

function index() {
    global $costs;
    $costs = find_all('tbl_costs');
}

function calculate() {
    global $costs;
    $costs = find_all('tbl_costs');
}

/**
 *  Cadastro de Despesa
 */
function add() {

  if (!empty($_POST['cost'])) {

    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $cost = $_POST['cost'];
    $cost['modification_date_dt'] = $cost['creation_date_dt'] = $today->format("Y-m-d H:i:s");
    save('tbl_costs', $cost);
    header('location: add_cost.php');
    die();
  }
}

/**
 *  Atualizacao/Edicao de Despesa
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['cost'])) {
      $cost = $_POST['cost'];
      $cost['modification_date_dt'] = $now->format("Y-m-d H:i:s");
      update('tbl_costs', $id, $cost);
      //header('location: edit_course.php?id=' + $id);
      header('location: view_cost.php');
      die();
    } else {
      global $cost;
      $cost = find('tbl_costs', $id);
      header('location: edit_cost.php?id=' + $id);
    }
  } else {
    header('location: edit_cost.php?id=' + $id);
  }
}

/**
 *  Exclusão de uma Despesa
 */
function delete($id = null) {
  global $cost;
  $cost = remove('tbl_costs', $id);
  header('location: view_cost.php');
}