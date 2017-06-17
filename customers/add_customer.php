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


<?php if ($db) : ?>

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Cadastro de Cliente</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <form role="form" action="add_customer.php" data-toggle="validator" method="post">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="customer['name_var']" data-error="Por favor, informe um nome válido." required>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control" name="customer['address_var']" data-error="Por favor, informe um endereço válido."  required>
                                             <div class="help-block with-errors"></div>
                                        </div>
                                         <div class="form-group">
                                            <label>RG</label>
                                            <input type="text" class="form-control" name="customer['rg_var']" data-error="Por favor, informe um RG válido."  data-mask="00.000.000-0" required>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" class="form-control" name="customer['cpf_var']" data-error="Por favor, informe um CPF válido"  data-mask="000.000.000-00" required>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" name="customer['email_var']" placeholder="Digite um e-mail válido..." data-error="Formato de email incorreto."  required>
                                            <p class="help-block">Por exemplo: email@email.com</p>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                         <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" name="customer['telefone_var']" data-error="Por favor, informe um telefone válido."  data-mask="(00) 00000-0000" required>
                                             <div class="help-block with-errors"></div>

                                        </div>

                                        <div class="form-group">
                                            <label>Data de Nascimento</label>
                                            <input type="text" class="form-control" name="customer['telefone_var']" data-error="Por favor, informe um telefone válido."  data-mask="(00) 00000-0000" required>
                                             <div class="help-block with-errors"></div>

                                        </div>

                                        <div class="form-group">
                                            <label>Interesses</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="customer['tarot_tni']">Tarot
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                   <input type="checkbox" value="1" name="customer['cabala_tni']">Kabbalah
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="customer['astrologia_tni']">Astrologia
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="customer['umbanda_tni']">Umbanda
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="customer['hermetismo_tni']">Hermetismo
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="customer['reiki_tni']">Reiki
                                                </label>
                                            </div>
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