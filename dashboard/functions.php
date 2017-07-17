<?php
require_once('config.php');
require_once(DBAPI);
$coursesOpen = null;
$counterCustomers = null;
$coursesFill = null;
$currentBalance = null;

function initFunctions() {
  countCustomers();
  countCoursesOpen();
  coursesFill();
  getBalance();
}

// Conta a quantidade de clientes existentes na base
function countCustomers() {
    global $counterCustomers;
    $customers = find_all('tbl_customers');
    $count = 0;
    foreach($customers as $customer) {
        $count +=1;
    }
    $counterCustomers = $count;
}
// Conta a quantidade de cursos em aberto
function countCoursesOpen() {
    global $coursesOpen;
    $courses = findByString('tbl_courses', 'status_var', 'Aberto');
    $count = 0;
    foreach($courses as $course) {
        $count +=1;
    }
    $coursesOpen= $count;
}
// Conta a quantidade de clientes existentes na base
function coursesFill() {
    global $coursesFill;
    $coursesFill = findCoursesFill();
}

function getBalance() {
    global $currentBalance;
    $allBalance = find_all('tbl_cash_flow');

    foreach($allBalance as $balance) {
        if($balance['month_int']==intval(date('m')) && $balance['year_int']==date('Y')) {
            $currentBalance = $balance;
       }
    }
}
?>