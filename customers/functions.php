<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
$interests = null;
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

function getInterests() {
   global $interests;
   $interests = find('tbl_interests');
}

/**
 *  Cadastro de Clientes
 */
function add() {
  if (!empty($_POST['customer']) && !empty($_POST['interest'])) {

      try {
        $today =
        date_create('now', new DateTimeZone('America/Sao_Paulo'));
      $customer = $_POST['customer'];
      $customer['modification_date_dt'] = $customer['creation_date_dt'] = $today->format("Y-m-d H:i:s");
      $interest = $_POST['interest'];
      //$interest['modification_date_dt'] = $interest['creation_date_dt'] = $today->format("Y-m-d H:i:s");

      save('tbl_customers', $customer);
      //reset($customer) retorna o primeiro valor do array, no caso o nome do cliente
      $savedCustomer = findByColumn('tbl_customers', 'name_var', reset($customer));

      foreach($interest as $key => $value)
      {
        $mykey = $key;
        $keyInt = str_replace("'", "", $mykey);
        $customerInterest = array(
        'tbl_customers_id' => $savedCustomer['id'],
        'tbl_interests_id' =>  intval($keyInt),
        'isinterest_tni' => intval($value),
        'creation_date_dt' => $today->format("Y-m-d H:i:s"),
        'modification_date_dt' => $today->format("Y-m-d H:i:s"),
        );
        save('tbl_customer_interests', $customerInterest);
      }

      $_SESSION['message'] = "Cliente cadastrado com sucesso!";
      $_SESSION['type'] = 'success';

      //save('tbl_customer_interests', $interest);
      header('location: add_customer.php');
      die();
    } catch (PDOException $e) {
       $_SESSION['message'] = "Não foi possível adicionar o cliente. Erro no banco de dados. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    } catch (Exception $e) {
       $_SESSION['message'] = "Não foi possível adicionar o cliente. Erro no banco na aplicação. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    }
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
      header('location: view_customer.php');
      die();
    } else {
      global $customer;
      $customer = find('tbl_customers', $id);
    }
  } else {
    //header('location: add_customer.php');
  }
}

/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {
  global $customer;
  $customer = remove('tbl_customers', $id);
  header('location: view_customer.php');
}