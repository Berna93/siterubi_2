<?php
include('../session.php');
?>
<?php
  require_once('functions.php');
  add();
  getInterests();
?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>





 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Cadastro de Cliente</h4>
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

                                    <form role="form" action="add_customer.php" data-toggle="validator" method="post">
                                       <div class="form-group">
                                            <label>Nome</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" maxlength="50" class="form-control" name="customer['name_var']" placeholder="Digite o nome do cliente..." type="text"
                                                  data-error="Por favor, informe um nome válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>Endereço</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-home"></span></span>
                                            <input type="text" maxlength="50" class="form-control" name="customer['address_var']" placeholder="Digite o endereco do cliente..." type="text"
                                                  data-error="Por favor, informe um endereço válido." required>
                                             </div>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                          <div class="form-group">
                                            <label>RG</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon glyphicon-duplicate"></span></span>
                                            <input type="number" min="111111111" max="999999999" class="form-control" name="customer['rg_var']" placeholder="Digite o RG do cliente..." type="text"
                                                  data-error="Por favor, informe um RG válido." required>
                                             </div>
                                             <div class="help-block with-errors"></div>
                                         </div>
                                          <div class="form-group">
                                            <label>CPF</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon glyphicon-duplicate"></span></span>
                                            <input type="number" min="11111111111" max="99999999999" class="form-control" name="customer['cpf_var']" placeholder="Digite o CPF do cliente..."
                                                  data-error="Por favor, informe um CPF válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>
                                         <div class="form-group">
                                            <label>E-mail</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-floppy-disk"></span></span>
                                            <input id="inputEmail" maxlength="30" class="form-control" name="customer['email_var']" placeholder="Digite o e-mail..." type="email"
                                                  data-error="Por favor, informe um e-mail válido." required>

                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                         <div class="form-group">
                                            <label>Telefone</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-phone"></span></span>
                                            <input type="number" min="111111111" max="99999999999" class="form-control" name="customer['phone_var']" placeholder="Digite o telefone do cliente..." type="text"
                                                  data-error="Por favor, informe um telefone válido." required>
                                             </div>
                                              <div class="help-block with-errors"></div>
                                         </div>

                                        <div class="form-group">
                                            <label>Data de Nascimento</label>
                                            <div class="input-group input-append">
                                             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="text" class="form-control" name="customer['birthday_dt']" placeholder="Digite a data de nascimento do cliente..." type="text"
                                                  data-error="Por favor, informe um telefone válido." required>
                                             </div>
                                             <div class="help-block with-errors"></div>
                                         </div>

                                        <div class="form-group">
                                            <label>Interesses</label>
                                            <?php if ($interests) : ?>
                                                <?php foreach ($interests as $value) : ?>

                                                    <div class="checkbox">
                                                <label>
                                                    <input type="hidden" name="interest['<?php echo $value['id']; ?>']" value="0">
                                                    <input type="checkbox" value="1" name="interest['<?php echo $value['id']; ?>']"><?php echo $value['name_var']; ?>
                                                </label>
                                            </div>

                                                <?php endforeach; ?>
                                            <?php endif; ?>

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

        <?php include(FOOTER_TEMPLATE); ?>