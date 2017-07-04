<?php
require_once('functions.php');
require_once('../courses/functions.php');
findElementByColumnNumber('tbl_course_customers', 'tbl_courses_id', $_GET['courseId']);

if ($elements) {
    $headings = array('ID da Inscricao', 'IDdoCurso', 'NomeDoCurso', 'IDdoCliente', 'NomeDoCliente', 'Pagamento', 'DataDeCriacao', 'DatadeModificacao');
    echo outputCSV($elements, $headings);
    die();
} else {

}

?>