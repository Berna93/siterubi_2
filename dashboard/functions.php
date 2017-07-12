<?php
require_once('config.php');
require_once(DBAPI);
$coursesOpen = null;
$counterCustomers = null;

function countCustomers() {
    global $counterCustomers;
    $customers = find_all('tbl_customers');
    $count = 0;
    foreach($customers as $customer) {
        $count +=1;
    }
    $counterCustomers = $count;
}

function countCoursesOpen() {
    global $coursesOpen;
    $courses = findByString('tbl_courses', 'status_var', 'Aberto');
    $count = 0;
    foreach($courses as $course) {
        $count +=1;
    }
    $coursesOpen= $count;
}
?>