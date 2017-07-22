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

function findCustomerByName($name = null) {
  global $element;
  $results = find_customer_by_name($name);

  foreach($results as $result) {
    $element = $result;
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
    try {


    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $course = $_POST['course'];
    $course['modification_date_dt'] = $course['creation_date_dt'] = $today->format("Y-m-d H:i:s");
    $course['numSlotsTaken_int'] = 0;
    $course['status_var'] = 'Aberto';

    //Formatando a data para insercao no banco
    foreach ($course as $key => $value) {
        if($key=="'event_date_dt'") {
           $valueReplace = str_replace('/', '-', $value);
           $date = strtotime($valueReplace);
           $course["'event_date_dt'"] = date('Y-m-d',$date);
        }
      }

    //save('tbl_courses', $course);
    insert_course($course);

      $_SESSION['message'] = "Curso cadastrado com sucesso!";
      $_SESSION['type'] = 'success';
    header('location: add_course.php');
    die();
    } catch (PDOException $e) {
       $_SESSION['message'] = "Não foi possível adicionar curso. Erro no banco de dados. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    } catch (Exception $e) {
       $_SESSION['message'] = "Não foi possível adicionar o curso. Erro na aplicação. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    }

  }
}

/**
 *  Cadastro de Cliente em Curso
 */
function addCourseCustomer($customer = null) {
  if (!empty($customer)) {

    try {
         $today =
        date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $customer['modification_date_dt'] = $customer['creation_date_dt'] = $today->format("Y-m-d H:i:s");

        //save('tbl_course_customers', $customer);
        insert_course_customer($customer);
        $_SESSION['message'] = "Cliente inserido com sucesso!";
        $_SESSION['type'] = 'success';
        header('location: view_course_customers.php?id=' . $customer['tbl_courses_id']);

    } catch (PDOException $e) {
       $_SESSION['message'] = "Não foi possível adicionar o cliente no curso. Erro no banco de dados. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    } catch (Exception $e) {
       $_SESSION['message'] = "Não foi possível adicionar o cliente no curso. Erro na aplicação. Exceção: " . $e->GetMessage();
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
    if (isset($_POST['course'])) {

     try {
        $course = $_POST['course'];
        $course['modification_date_dt'] = $now->format("Y-m-d H:i:s");

         //Formatando a data para insercao no banco
        foreach ($course as $key => $value) {
        if($key=="'event_date_dt'") {
           $valueReplace = str_replace('/', '-', $value);
           $date = strtotime($valueReplace);
           $course["'event_date_dt'"] = date('Y-m-d',$date);
            }
        }

        //update('tbl_courses', $id, $course);
        update_course($id, $course);
        $_SESSION['message'] = "Curso atualizado com sucesso!";
        $_SESSION['type'] = 'success';
        //header('location: edit_course.php?id=' + $id);
        header('location: view_course.php');
        //header('location: edit_course.php?id=' + $id);
      die();
      } catch (PDOException $e) {
       $_SESSION['message'] = "Não foi possível atualizar o curso. Erro no banco de dados. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    } catch (Exception $e) {
       $_SESSION['message'] = "Não foi possível atualizar o curso. Erro na aplicação. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    }

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
    try {
         $course['modification_date_dt'] = $now->format("Y-m-d H:i:s");
         //update('tbl_courses', $course['id'], $course);
         update_course_slotstaken($course['id'], $course);
  } catch (PDOException $e) {
       $_SESSION['message'] = "Não foi possível atualizar a quantidade de vagas preenchidas no curso. Erro no banco de dados. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    } catch (Exception $e) {
       $_SESSION['message'] = "Não foi possível atualizar  a quantidade de vagas preenchidas no curso. Erro na aplicação. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    }

  }
}

/**
 *  Atualizacao/Edicao de Cliente
 */
function editPayment($courseCustomer) {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (!empty($courseCustomer)) {
    try {
         $courseCustomer['modification_date_dt'] = $now->format("Y-m-d H:i:s");
         //update('tbl_course_customers', $courseCustomer['id'], $courseCustomer);
         update_course_customer_payment($courseCustomer['id'], $courseCustomer);
         $_SESSION['message'] = "Pagamento atualizado com sucesso!";
         $_SESSION['type'] = 'success';

         header('location: view_course_customers.php?id=' . $courseCustomer['tbl_courses_id']);
    } catch (PDOException $e) {
       $_SESSION['message'] = "Não foi possível atualizar o pagamento do cliente. Erro no banco de dados. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    } catch (Exception $e) {
       $_SESSION['message'] = "Não foi possível atualizar  o pagamento do cliente. Erro na aplicação. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    }

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