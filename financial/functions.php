<?php
require_once('../config.php');
require_once(DBAPI);
$costs = null;

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