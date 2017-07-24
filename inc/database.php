<?php

/**
*  Insere um cliente no banco de dados
*/
function insert_customer($customer = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO tbl_customers(name_var,cpf_var,rg_var,birthday_dt,address_var, email_var, phone_var, creation_date_dt, modification_date_dt) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7,:field8,:field9)");
  $stmt->execute(array(
    ':field1' => $customer["'name_var'"],
    ':field2' => $customer["'cpf_var'"],
    ':field3' => $customer["'rg_var'"],
    ':field4' => $customer["'birthday_dt'"],
    ':field5' => $customer["'address_var'"],
    ':field6' => $customer["'email_var'"],
    ':field7' => $customer["'phone_var'"],
    ':field8' => $customer['creation_date_dt'],
    ':field9' => $customer['modification_date_dt']));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

function insert_course_customer($customer = null) {

  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO tbl_course_customers(tbl_courses_id,tbl_courses_name_var,tbl_customers_id,tbl_customers_name_var,payment_tni, payment_date_dt, creation_date_dt, modification_date_dt) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7,:field8)");
  $stmt->execute(array(
    ':field1' => $customer['tbl_courses_id'],
    ':field2' => $customer['tbl_courses_name_var'],
    ':field3' => $customer['tbl_customers_id'],
    ':field4' => $customer['tbl_customers_name_var'],
    ':field5' => $customer['payment_tni'],
    ':field6' => $customer['payment_date_dt'],
    ':field7' => $customer['creation_date_dt'],
    ':field8' => $customer['modification_date_dt']));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;

}

/**
*  Insere um curso no banco de dados
*/
function insert_course($course = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO tbl_courses(name_var,professor_var,numSlots_int,numSlotsTaken_int,price_int, event_date_dt, event_hour_var, status_var, creation_date_dt, modification_date_dt) VALUES(:field1,:field2,:field3,:field4,:field5,:field6,:field7,:field8,:field9,:field10)");
  $stmt->execute(array(
    ':field1' => $course["'name_var'"],
    ':field2' => $course["'professor_var'"],
    ':field3' => $course["'numSlots_int'"],
    ':field4' => $course['numSlotsTaken_int'],
    ':field5' => $course["'price_int'"],
    ':field6' => $course["'event_date_dt'"],
    ':field7' => $course["'event_hour_var'"],
    ':field8' => $course['status_var'],
    ':field9' => $course['creation_date_dt'],
    ':field10' => $course['modification_date_dt']));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Atualiza um cliente no banco de dados
*/
function update_customer($idCustomer = null, $customer = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('UPDATE tbl_customers SET name_var=:field1,cpf_var=:field2,rg_var=:field3,birthday_dt=:field4,address_var=:field5, email_var=:field6, phone_var=:field7, modification_date_dt=:field8 WHERE id=:idCustomer');
  $stmt->execute(array(
    ':field1' => $customer["'name_var'"],
    ':field2' => $customer["'cpf_var'"],
    ':field3' => $customer["'rg_var'"],
    ':field4' => $customer["'birthday_dt'"],
    ':field5' => $customer["'address_var'"],
    ':field6' => $customer["'email_var'"],
    ':field7' => $customer["'phone_var'"],
    ':field8' => $customer['modification_date_dt'],
    ':idCustomer' => $idCustomer));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Atualiza um curso no banco de dados
*/
function update_course($idCourse= null, $course = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('UPDATE tbl_courses SET name_var=:field1,professor_var=:field2,numSlots_int=:field3,price_int=:field4,event_date_dt=:field5, event_hour_var=:field6, modification_date_dt=:field7 WHERE id=:idCourse');
  $stmt->execute(array(
    ':field1' => $course["'name_var'"],
    ':field2' => $course["'professor_var'"],
    ':field3' => $course["'numSlots_int'"],
    ':field4' => $course["'price_int'"],
    ':field5' => $course["'event_date_dt'"],
    ':field6' => $course["'event_hour_var'"],
    ':field7' => $course['modification_date_dt'],
    ':idCourse' => $idCourse));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Atualiza quantidade de vagas preenchidas em curso
*/
function update_course_slotstaken($idCourse= null, $course = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('UPDATE tbl_courses SET numSlotsTaken_int=:field1,modification_date_dt=:field2 WHERE id=:idCourse');
  $stmt->execute(array(
    ':field1' => $course['numSlotsTaken_int'],
    ':field2' => $course['modification_date_dt'],
    ':idCourse' => $idCourse));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Atualiza status do curso
*/
function update_course_status($idCourse= null, $course = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('UPDATE tbl_courses SET status_var=:field1,modification_date_dt=:field2 WHERE id=:idCourse');
  $stmt->execute(array(
    ':field1' => $course['status_var'],
    ':field2' => $course['modification_date_dt'],
    ':idCourse' => $idCourse));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Atualiza o pagamento de um cliente
*/
function update_course_customer_payment($idCourseCustomer= null, $courseCustomer = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('UPDATE tbl_course_customers SET payment_tni=:field1,payment_date_dt=:field2 WHERE id=:id');
  $stmt->execute(array(
    ':field1' => $courseCustomer['payment_tni'],
    ':field2' => $courseCustomer['payment_date_dt'],
    ':id' => $idCourseCustomer));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

function update_cost($idCost= null, $cost = null) {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $stmt = $conn->prepare('UPDATE tbl_costs SET type_var=:field1,value_int=:field2,payment_tni=:field3,deadline_dt=:field4,modification_date_dt=:field5 WHERE id=:id');
  $stmt->execute(array(
    ':field1' => $cost["'type_var'"],
    ':field2' => $cost["'value_int'"],
    ':field3' => $cost["'payment_tni'"],
    ':field4' => $cost["'deadline_dt'"],
    ':field5' => $cost['modification_date_dt'],
    ':id' => $idCost));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Insere um interesses do cliente no banco de dados
*/
function insert_customer_interests($customerInterests = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO tbl_customer_interests(tbl_customers_id,tbl_interests_id,isinterest_tni,creation_date_dt, modification_date_dt) VALUES(:field1,:field2,:field3,:field4,:field5)");
  $stmt->execute(array(
    ':field1' => $customerInterests['tbl_customers_id'],
    ':field2' => $customerInterests['tbl_interests_id'],
    ':field3' => $customerInterests['isinterest_tni'],
    ':field4' => $customerInterests['creation_date_dt'],
    ':field5' => $customerInterests['modification_date_dt']
    ));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Insere uma despesa no banco de dados
*/
function insert_cost($cost = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO tbl_costs(type_var,value_int,payment_tni,deadline_dt, creation_date_dt, modification_date_dt) VALUES(:field1,:field2,:field3,:field4,:field5,:field6)");
  $stmt->execute(array(
    ':field1' => $cost["'type_var'"],
    ':field2' => $cost["'value_int'"],
    ':field3' => $cost["'payment_tni'"],
    ':field4' => $cost["'deadline_dt'"],
    ':field5' => $cost['creation_date_dt'],
    ':field6' => $cost['modification_date_dt']
    ));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Seleciona os dez cursos em aberto mais proximos para exibicao no Dashboard
*/
function find_courses_fill() {

  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_courses WHERE status_var='Aberto' ORDER BY event_date_dt ASC LIMIT 10;");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

function find_customer_all() {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_customers");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

function find_cost_all() {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_costs");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

function find_cost_by_id($id = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_costs WHERE id=:id");
   $stmt->execute(array(':id' => $id));
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_course_all() {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_courses");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

function find_customer_by_id($id = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_customers WHERE id=:id");
   $stmt->execute(array(':id' => $id));
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_course_by_status($status = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_courses WHERE status_var LIKE ?");
   $stmt->bindValue(1, "%$status%", PDO::PARAM_STR);
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

function find_customer_by_name($name = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_customers WHERE name_var LIKE ?");
   $stmt->bindValue(1, "%$name%", PDO::PARAM_STR);
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

function find_course_by_id($id = null) {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_courses WHERE id=:id");
   $stmt->execute(array(':id' => $id));
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_course_by_name($name = null) {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_courses WHERE name_var LIKE ?");
   $stmt->bindValue(1, "%$name%", PDO::PARAM_STR);
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_interest_all() {

   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_interests");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_cash_flow_all() {

   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_cash_flow");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_customer_interests($idCustomer = null) {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_customer_interests WHERE tbl_customers_id=:id");
   $stmt->execute(array(':id' => $idCustomer));
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_course_customers_by_courseid($idCourse = null) {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_course_customers WHERE tbl_courses_id=:id");
   $stmt->execute(array(':id' => $idCourse));
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

function find_course_customers_by_id($id = null) {
   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_course_customers WHERE id=:id");
   $stmt->execute(array(':id' => $id));
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}

/**
*  Seleciona todas as despesas cadastradas, somando seus valores
*/
function get_costs() {

   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT SUM(value_int) as 'value', MONTH(deadline_dt) as 'month', YEAR(deadline_dt) as 'year' FROM tbl_costs GROUP BY MONTH(deadline_dt)");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}

function find_cashflow_by_month_year($month = null, $year =null) {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT * FROM tbl_cash_flow WHERE month_int=:month and year_int=:year");
   $stmt->execute(array(
    ':month' => $month,
    ':year' => $year));
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;
}



function update_cash_flow_costs($idCashFlow= null, $cashflow = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('UPDATE tbl_cash_flow SET costs_int=:field1,balance_int=:field2 WHERE id=:idCashFlow');
  $stmt->execute(array(
    ':field1' => $cashflow['costs_int'],
    ':field2' => $cashflow['balance_int'],
    ':idCashFlow' => $idCashFlow));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

function update_cash_flow_incomes($idCashFlow= null, $cashflow = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('UPDATE tbl_cash_flow SET income_int=:field1,balance_int=:field2 WHERE id=:idCashFlow');
  $stmt->execute(array(
    ':field1' => $cashflow['income_int'],
    ':field2' => $cashflow['balance_int'],
    ':idCashFlow' => $idCashFlow));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}

/**
*  Insere um registro de fluxo de caixa
*/
function insert_cash_flow($cashflow = null) {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO tbl_cash_flow(month_int,year_int,costs_int,income_int,balance_int) VALUES(:field1,:field2,:field3,:field4,:field5)");
  $stmt->execute(array(
    ':field1' => $cashflow['month_int'],
    ':field2' => $cashflow['year_int'],
    ':field3' => $cashflow['costs_int'],
    ':field4' => $cashflow['income_int'],
    ':field5' => $cashflow['balance_int']));
  $affected_rows = $stmt->rowCount();

  return $affected_rows;
}



/**
*  Seleciona todos os pagamentos confirmados de todos os cursos, somando seus valores
*/
function get_incomes() {

   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare("SELECT SUM(price_int) as 'value', MONTH(payment_date_dt) as 'month', YEAR(payment_date_dt) as 'year' FROM tbl_courses
          INNER JOIN tbl_course_customers on tbl_courses.id = tbl_course_customers.tbl_courses_id
          WHERE tbl_course_customers.payment_date_dt is not null and tbl_course_customers.payment_date_dt!='0000-00-00'
          GROUP BY MONTH(tbl_course_customers.payment_date_dt)");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $results;

}


function remove_course_customer($id = null) {

    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('DELETE FROM tbl_course_customers WHERE id=:term');
    $stmt->execute(array('term' => $id));

}

function remove_cost($id = null) {

    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('DELETE FROM tbl_costs WHERE id=:term');
    $stmt->execute(array('term' => $id));

}

/**
 *  Deleta curso
 */
function remove_course($id = null) {

    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('DELETE FROM tbl_courses WHERE id=:term');
    $stmt->execute(array('term' => $id));

}

/**
 *  Deleta cliente
 */
function remove_customer($id = null) {

    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('DELETE FROM tbl_customers WHERE id=:term');
    $stmt->execute(array('term' => $id));

}

/**
 *  Deleta interesses dos clientes
 */
function remove_interests($idCustomer = null ) {

      $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare('DELETE FROM tbl_customer_interests WHERE tbl_customers_id=:term');
      $stmt->execute(array('term' => $idCustomer));


}

/**
 *  Deleta os fluxos de caixa
 */
function remove_cash_flow() {

   $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $conn->prepare('DELETE FROM tbl_cash_flow');
   $stmt->execute();

}
