<?php
include('../session.php');
?>
<?php
  require_once('functions.php');
  add();
?>

<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<?php if ($db) : ?>

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Cadastro de Despesa</h4>
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

                                    <form role="form" action="add_cost.php" data-toggle="validator" method="post">

                                       <div class="form-group">

                                          <label for="sel1">Selecione o tipo de despesa:</label>
                                          <select class="form-control " id="costType" name="cost['type_var']">
                                            <option value="professor">Professor</option>
                                            <option value="materiais">Materiais</option>
                                            <option value="energia">Energia </option>
                                            <option value="agua"> Agua </option>
                                          </select>

                                         </div>

                                          <div class="form-group">

                                          <label for="sel1">Depesa paga:</label>
                                          <select class="form-control " id="payment" name="cost['payment_tni']">
                                            <option value="1">Pagamento Realizado</option>
                                            <option value="0">Aguardando Pagamento</option>
                                          </select>

                                         </div>

                                         <div class="form-group">
                                            <label>Valor da Despesa</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-usd"></span></span>
                                            <input type="text" class="form-control" name="cost['value_int']" placeholder="Digite o valor da despesa..." type="text"
                                                  data-error="Por favor, informe um valor da despesa válido." required>
                                             </div>
                                             <div class="help-block with-errors"></div>
                                         </div>

                                          <div class="form-group" >
                                        <label>Vencimento da Despesa</label>

                                        <div class="input-group input-append date" id="datePicker">
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="text" class="form-control" name="cost[deadline_dt]" placeholder="Informe o vencimento da despesa..." data-error="Por favor, informe uma data de vencimento válida." required/>

                                        </div>
                                        <div class="help-block with-errors"></div>

                                    </div>


                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                        <button type="reset" class="btn btn-warning">Limpar</button>
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
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
});
</script>

        <?php include(FOOTER_TEMPLATE); ?>