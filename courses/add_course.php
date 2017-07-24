<?php
include('../session.php');
?>
<?php
  require_once('functions.php');
  add();
?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>

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


<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Cadastro de Curso</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                   <?php if (!empty($_SESSION['message'])) : ?>
                              <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $_SESSION['message']; ?>
                              </div>
                              <?php unset($_SESSION['message']); ?>
                            <?php endif; ?>
                                <div class="col-lg-6">

                                    <form role="form" action="add_course.php" data-toggle="validator" method="post">
                                         <div class="form-group">
                                            <label>Nome do Curso</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-book"></span></span>
                                            <input type="text" class="form-control" name="course['name_var']" placeholder="Digite o nome do curso..." data-error="Por favor, informe um nome de curso válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>
                                        <div class="form-group">
                                            <label>Nome do Professor/Palestrante</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="course['professor_var']" placeholder="Digite o nome do professor..."  data-error="Por favor, informe um nome válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Quantidade de Vagas</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-tasks"></span></span>
                                            <input type="number" class="form-control" name="course['numSlots_int']" placeholder="Digite a quantidade de vagas ..."  data-error="Por favor, informe uma quantidade válida." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Valor do Curso</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-usd"></span></span>
                                            <input type="number" class="form-control" name="course['price_int']" placeholder="Digite o valor (individual) do curso ..."  data-error="Por favor, informe um valor válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>


                                        <div class="form-group" >
                                        <label>Data do Curso</label>

                                        <div class="input-group input-append date" id="datePicker">
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="text" class="form-control" name="course['event_date_dt']" placeholder="Informe a data do curso ..."  data-error="Por favor, informe uma data válida." required/>
                                        </div>
                                         <div class="help-block with-errors"></div>

                                    </div>
                                     <div class="form-group">
                                            <label>Horário do Curso</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-usd"></span></span>
                                            <input type="number" class="form-control" name="course['event_hour_var']" placeholder="Digite o horário do curso ..."  data-error="Por favor, informe um horário válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>

                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                        <button type="reset" class="btn btn-warning">Desfazer Alterações</button>


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

<?php include(FOOTER_TEMPLATE); ?>