<?php
include('../session.php');
?>
<?php
    require_once('functions.php');
    index();
?>
<?php include(HEADER_TEMPLATE); ?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {

  //autocomplete
  $(".auto").autocomplete({
    source: "search.php",
    minLength: 1
  });

});
</script>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Inscrições de Curso</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                        <form action='' method='post'>
                                          <label>Incluir Cliente:</label>
                                          <div class="form-group input-group">

                                            <input type="text" name='incluirCliente' value='' class='auto form-control' placeholder="Pesquise um cliente (por nome)...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>

                                        </form>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
<script type="text/javascript">
$(document).ready( function() {
  $('#tableCourses').dataTable( {
    "oLanguage": {
      "sSearch": "Buscar clientes:",
      "sLengthMenu": "Mostrar _MENU_ clientes",
      "sInfo": "Mostrando _START_ até _END_ em um total de _TOTAL_ registros.",
      "sEmptyTable": "Nenhum registro encontrado.",
      "sInfoEmpty": "Nenhum registro para ser mostrado.",
      "sInfoFiltered": " - filtrado de um total de _MAX_ registros",
      "sZeroRecords": "Nenhum registro encontrado.",
      "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior"
      }
    }
  } );
} );

</script>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>

