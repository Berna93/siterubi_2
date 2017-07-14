<?php
include('../session.php');
?>
<?php
    require_once('functions.php');
    indexCourseCustomers('tbl_courses_id', $_GET['id']);
    search($_GET['id']);
?>
<?php include(HEADER_TEMPLATE); ?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
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
                              <div class="col-lg-12" align="right">
                        <a href="<?php echo BASEURL; ?>download/download.php?courseId=<?php $aux; $aux = $courseCustomers[0]; echo $aux['tbl_courses_id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Inscritos</a>
                    </div>
                            <?php if (!empty($_SESSION['message'])) : ?>
                              <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $_SESSION['message']; ?>
                              </div>
                              <?php unset($_SESSION['message']); ?>
                            <?php endif; ?>
                                <div class="col-lg-4">
                                        <form action='include_customer.php' method='post'>
                                          <label>Incluir Cliente:</label>
                                          <div class="form-group input-group">
                                           <input type="hidden" name="courseId" class="form-control" value="<?php echo $_GET['id']; ?>">
                                            <input type="text" name='includeCustomer' value='' class='auto form-control' placeholder="Pesquise um cliente (por nome)...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>

                                        </form>
                                         <div class="form-group">
                                            <label>Quantidade de Vagas</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-tasks"></span></span>
                                            <input type="text" class="form-control" name="courses['numSlots_int']" value="<?php echo $courses['numSlots_int']; ?>" disabled>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                            <label>Quantidade de Vagas Preenchidas</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-tasks"></span></span>
                                            <input type="text" class="form-control" name="courses['numSlotsTaken_int']" value="<?php echo $courses['numSlotsTaken_int']; ?>" disabled>
                                             </div>
                                         </div>
                                        </div>


                                        <div class="container">
        <div class="row">
            <div class="col-lg-12">

<table id="tableCourseCustomers" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
    <tr>
        <th>ID</th>
        <th width="30%">Nome do Curso</th>
        <th>Nome do Inscrito</th>
        <th>Pagamento</th>
        <th> Data de Pagamento </th>
        <th>Incluído em</th>
        <th>Opções</th>
    </tr>
</thead>
<tbody>
 <form action='payment.php' method='post'>
<?php if ($courseCustomers) : ?>
<?php foreach ($courseCustomers as $courseCustomer) : ?>
    <tr>
        <td><?php if(isset($courseCustomer['id'])) { echo $courseCustomer['id']; }  ?></td>
        <td><?php echo $courseCustomer['tbl_courses_name_var']; ?></td>
        <td><?php echo $courseCustomer['tbl_customers_name_var']; ?></td>
        <td>
         <?php if ($courseCustomer['payment_tni']==0) : ?>
             <a href="#" class="btn btn-success <?php if ($courseCustomer['payment_tni']==1) echo "disabled"; ?>"" data-toggle="modal" data-target="#payment-modal-customer" data-payment="<?php echo $courseCustomer['payment_tni']; ?>" data-customer="<?php echo $courseCustomer['id']; ?>" data-course="<?php echo $courseCustomer['tbl_courses_id']; ?>">
                                            <i class="fa fa-dollar"></i> Pagar
              </a>
        <?php else : ?>
               <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#payment-modal-customer" data-course="<?php echo $courseCustomer['tbl_courses_id']; ?>" data-payment="<?php echo $courseCustomer['payment_tni']; ?>" data-customer="<?php echo $courseCustomer['id']; ?>" data-course="<?php echo $courseCustomer['tbl_courses_id']; ?>">
                                            <i class="fa fa-close"></i> Cancelar Pagamento
              </a>

        <?php endif; ?>

        </td>
        <td><?php if($courseCustomer['payment_date_dt']=="0000-00-00") { echo ""; } else { $date = date_create($courseCustomer['payment_date_dt']); echo date_format($date, 'd/m/Y'); } ?></td>
        <td><?php $date = date_create($courseCustomer['creation_date_dt']); echo date_format($date, 'd/m/Y'); ?></td>
        <td> <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-customer" data-course="<?php echo $courseCustomer['tbl_courses_id']; ?>" data-customer="<?php echo $courseCustomer['id']; ?>">
                                            <i class="fa fa-trash"></i> Excluir
                                        </a>


        </td>
    </tr>

<?php endforeach; ?>

<?php else : ?>
    <tr>
        <td colspan="6">Nenhum registro encontrado.</td>
    </tr>
<?php endif; ?>
 </form>
</tbody>
</table>
</div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
<script type="text/javascript">
$(document).ready( function() {
  $('#tableCourseCustomers').dataTable( {
    "oLanguage": {
      "sSearch": "Buscar clientes:",
      "sLengthMenu": "Mostrar _MENU_ clientes",
      "sInfo": "Mostrando _START_ até _END_ em um total de _TOTAL_ registros.",
      "sEmptyTable": "Nenhum registro encontrado.",
      "sInfoEmpty": "Nenhum registro para ser mostrado.",
      "sInfoFiltered": " - filtrado de um total de _MAX_ registros",
      "sZeroRecords": "Nenhum cliente inscrito.",
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

