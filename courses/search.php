<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rubi');

if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare('SELECT name_var FROM tbl_customers WHERE name_var LIKE :term');
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['name_var'];
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>