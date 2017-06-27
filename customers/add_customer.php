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
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="customer['name_var']" placeholder="Digite o nome do cliente..." type="text"
                                                  data-error="Por favor, informe um nome válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Endereço</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-home"></span></span>
                                            <input type="text" class="form-control" name="customer['address_var']" placeholder="Digite o endereco do cliente..." type="text"
                                                  data-error="Por favor, informe um endereço válido." required>
                                             </div>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                          <div class="form-group">
                                            <label>RG</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon glyphicon-duplicate"></span></span>
                                            <input type="text" class="form-control" name="customer['rg_var']" placeholder="Digite o RG do cliente..." type="text"
                                                  data-error="Por favor, informe um RG válido." required>
                                             </div>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                          <div class="form-group">
                                            <label>CPF</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon glyphicon-duplicate"></span></span>
                                            <input type="text" class="form-control" name="customer['cpf_var']" placeholder="Digite o CPF do cliente..." type="text"
                                                  data-error="Por favor, informe um CPF válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>E-mail</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-floppy-disk"></span></span>
                                            <input id="inputEmail" class="form-control" name="customer['email'" placeholder="Digite o e-mail..." type="email"
                                                  data-error="Por favor, informe um e-mail válido." required>

                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                         <div class="form-group">
                                            <label>Telefone</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-phone"></span></span>
                                            <input type="text" class="form-control" name="customer['phone_var']" placeholder="Digite o telefone do cliente..." type="text"
                                                  data-error="Por favor, informe um telefone válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>

                                        <div class="form-group">
                                            <label>Data de Nascimento</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="text" class="form-control" name="customer['birthday_var']" placeholder="Digite a data de nascimento do cliente..." type="text"
                                                  data-error="Por favor, informe um telefone válido." required>
                                             </div>
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



                                        <button type="submit" class="btn btn-success">Cadastrar</button>
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