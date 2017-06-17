<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */
function index() {
    global $customers;
    $customers = find_all('tbl_customers');
}

function search($id = null) {
    global $customers;
    $customers = find('tbl_customers', $id);
}


/**
 *  Cadastro de Clientes
 */
function add() {
  if (!empty($_POST['customer'])) {

    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $customer = $_POST['customer'];
    $customer['modification_date_dt'] = $customer['created'] = $today->format("Y-m-d H:i:s");

    save('tbl_customers', $customer);
    header('location: add_customer.php');
  }
}

/**
 *  Atualizacao/Edicao de Cliente
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['customer'])) {
      $customer = $_POST['customer'];
      $customer['modification_date_dt'] = $now->format("Y-m-d H:i:s");
      update('tbl_customers', $id, $customer);
      //header('location: add_customer.php');
    } else {
      global $customer;
      $customer = find('tbl_customers', $id);
    }
  } else {
    //header('location: add_customer.php');
  }
}