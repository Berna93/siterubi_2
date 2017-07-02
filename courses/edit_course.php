<?php
include('../session.php');
?>
<?php
  require_once('functions.php');
  edit();
?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>
<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<style type="text/css">
/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#eventForm .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

<?php if ($db) : ?>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Edição de Curso</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <form role="form" action="edit_course.php?id=<?php echo $course['id']; ?>" data-toggle="validator" method="post">
                                         <div class="form-group">
                                            <label>Nome do Curso</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-book"></span></span>
                                            <input type="text" class="form-control" name="course['name_var']" value="<?php echo $course['name_var']; ?>" required>
                                             </div>
                                         </div>
                                        <div class="form-group">
                                            <label>Nome do Professor/Palestrante</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="course['professor_var']" value="<?php echo $course['professor_var']; ?>" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                            <label>Quantidade de Vagas</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-tasks"></span></span>
                                            <input type="text" class="form-control" name="course['numSlots_int']" value="<?php echo $course['numSlots_int']; ?>" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                            <label>Quantidade de Vagas Preenchidas</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-tasks"></span></span>
                                            <input type="text" class="form-control" name="course['numSlotsTaken_int']" value="<?php echo $course['numSlotsTaken_int']; ?>" disabled>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                            <label>Valor do Curso</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-usd"></span></span>
                                            <input type="text" class="form-control" name="course['price_var']" value="<?php echo $course['price_var']; ?>" data-error="Por favor, informe um CPF válido"  required>
                                             </div>
                                         </div>


                                        <div class="form-group" >
                                        <label>Data do Curso</label>

                                        <div class="input-group input-append date" id="datePicker">
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="text" class="form-control" name="course['event_date_dt']" value="<?php echo $course['event_date_dt']; ?>"  />

                                        </div>

                                    </div>

                                        <label>Contrato</label>
                                        <textarea class="form-control" rows="30" name="course['contract_var']" data-error="É preciso informar um contrato padrão para este curso." required> <?php echo $course['contract_var']; ?>  </textarea>
                                        <div class="help-block with-errors"></div>

                                         <button type="submit" class="btn btn-primary">Atualizar</button>
                                        <button type="reset" class="btn btn-warning">Limpar</button>

                                        <a href="#" class="btn btn-danger <?php if ($_SESSION['usertype']!='1') echo "disabled"; ?>" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $course['id']; ?>">
                                            <i class="fa fa-trash"></i> Excluir
                                        </a>

                                    </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>

<script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'dd/mm/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
});
</script>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>