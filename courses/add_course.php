<?php
include('../session.php');
?>
<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>


<?php if ($db) : ?>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Cadastro de Curso</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <form role="form" action="add_course.php" data-toggle="validator" method="post">
                                        <div class="form-group">
                                            <label>Nome do Curso</label>
                                            <input type="text" class="form-control" name="course['name_var']" data-error="Por favor, informe um nome válido." required>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Professor/Palestrante</label>
                                            <input type="text" class="form-control" name="course['professor_var']" data-error="Por favor, informe um endereço válido."  required>
                                             <div class="help-block with-errors"></div>
                                        </div>
                                         <div class="form-group">
                                            <label>Quantidade de Vagas</label>
                                            <input type="text" class="form-control" name="course['numSlots_int']" data-error="Por favor, informe um RG válido."  data-mask="00.000.000-0" required>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Valor do Curso</label>
                                            <input type="text" class="form-control" name="course['price_var']" data-error="Por favor, informe um CPF válido"  data-mask="000.000.000-00" required>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Data do Curso</label>
                                            <input type="email" class="form-control" name="course['event_date_dt']" placeholder="Digite um e-mail válido..." data-error="Formato de email incorreto."  required>
                                            <p class="help-block">Por exemplo: email@email.com</p>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                         <div class="form-group">

                                        <label>Contrato</label>
                                        <textarea class="form-control" rows="30" name="course['contract_var']"  data-error="É preciso informar um contrato padrão para este curso." required></textarea>
                                        <div class="help-block with-errors"></div>

                                    </div>



                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        <button type="reset" class="btn btn-warning">Limpar</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                    </form>
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

<?php include(FOOTER_TEMPLATE); ?>