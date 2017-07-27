<?php
require_once('../config.php');
require_once(DBAPI);

try {
    $conn = new PDO("mysql:host=localhost;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare('SELECT name_var, COUNT(numSlotsTaken_int) as counter FROM tbl_courses GROUP BY name_var');
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $table = array();
        $table['cols'] = array(
        //Labels for the chart, these represent the column titles
        array('id' => '', 'label' => 'Nome do Curso', 'type' => 'string'),
        array('id' => '', 'label' => 'Quantidade', 'type' => 'number')
    );

        $rows = array();
        foreach($results as $row){
            $temp = array();

            //Values
            $temp[] = array('v' => (string) $row['name_var']);
            $temp[] = array('v' => (float) $row['counter']);
            $rows[] = array('c' => $temp);
         }



$table['rows'] = $rows;

$jsonTable = json_encode($table, true);


echo $jsonTable;
} catch(PDOException $e) {
     echo "Erro";
}

// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

#$string = file_get_contents("data.json");
#echo $string;

// Instead you can query your database and parse into JSON etc etc

?>