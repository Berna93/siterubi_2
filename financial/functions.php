<?php
require_once('../config.php');
require_once(DBAPI);

$cost = null;
$cash_flow = null;
$month_flow = null;

function index() {
    global $costs;
    $costs = find_all('tbl_costs');
}

function getCashFlow() {
    global $cash_flow;
    global $month_flow;
    $cash_flow = find_all('tbl_cash_flow');
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

    foreach($cash_flow as $flow) {
       if($flow['month_int']==intval(date('m')) && $flow['year_int']==date('Y')) {
            $month_flow = $flow;
       }

    }

    ob_start();
  echo var_dump(date('Y'));

  $content = ob_get_contents();

  $f = fopen("file.txt", "w");
  fwrite($f, $content);
  fclose($f);
}

function calculate() {
    $groupedCosts = getCosts();
    $groupedIncomes = getIncomes();

    deleteCashFlows();

    foreach($groupedCosts as $cost) {
        foreach($groupedIncomes as $income) {
            if($cost['month']==$income['month'] && $cost['year']==$income['year']) {
                 $insert = array(
                    'month_int' => $cost['month'],
                    'year_int' =>  $cost['year'],
                    'costs_int' => $cost['value'],
                    'income_int' => $income['value'],
                    'balance_int' => intval($income['value'])-intval($cost['value']),
                    );
                 addCashFlow($insert);
            }
        }
    }
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

function addCashFlow($data = null) {

  if (!empty($data)) {
    save('tbl_cash_flow', $data);
    //header('location: add_cost.php');
    //die();
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