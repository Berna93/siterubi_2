<?php
include('../session.php');
?>
<?php
  require_once('functions.php');
  edit();
  getInterests();
?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>


<?php if ($db) : ?>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" align="center">
                        <div class="panel-heading">
                            <h4>Edição de Cliente</h4>
                        </div>
                        <div class="panel-body" align="left">
                            <div class="row">
                                <div class="col-lg-6">
                                <form role="form" action="edit_customer.php?id=<?php echo $customer['id']; ?>" data-toggle="validator" method="post">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="customer['name_var']" value="<?php echo $customer['name_var']; ?>" data-error="Por favor, informe um nome válido." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                 <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" name="customer['address_var']" value="<?php echo $customer['address_var']; ?>" data-error="Por favor, informe um endereço válido."  required>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group">
                                    <label>RG</label>
                                    <input type="text" class="form-control" name="customer['rg_var']" value="<?php echo $customer['rg_var']; ?>" data-error="Por favor, informe um RG válido."  data-mask="00.000.000-0" required>
                                    <div class="help-block with-errors"></div>
                                    <p class="help-block">Apenas números</p>
                                </div>
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" name="customer['cpf_var']" value="<?php echo $customer['cpf_var']; ?>" data-error="Por favor, informe um CPF válido"  data-mask="000.000.000-00" required>
                                    <div class="help-block with-errors"></div>
                                    <p class="help-block">Apenas números.</p>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" name="customer['email_var']" value="<?php echo $customer['email_var']; ?>" placeholder="Digite um e-mail válido..." data-error="Formato de email incorreto."  required>
                                    <p class="help-block">Por exemplo: email@email.com</p>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label>Telefone</label>

                                    <input type="text" class="form-control" name="customer['phone_var']" value="<?php echo $customer['phone_var']; ?>" data-error="Por favor, informe um telefone válido."  data-mask="(00) 00000-0000" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>Interesses</label>
                                            <?php if ($customerInterests) : ?>
                                                <?php foreach ($customerInterests as $value) : ?>

                                                    <div class="checkbox">
                                                <label>
                                                    <input type="hidden" name="interest['<?php echo $value['tbl_interests_id']; ?>']" value="0">
                                                    <input type="checkbox" value="1" <?php if($value['isinterest_tni']==1) echo "checked"; ?> name="interest['<?php echo $value['tbl_interests_id']; ?>']"><?php echo $value['name_var']; ?>
                                                </label>
                                            </div>

                                                <?php endforeach; ?>
                                            <?php endif; ?>



                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <button type="reset" class="btn btn-warning">Limpar</button>

                            <a href="#" class="btn btn-danger <?php if ($_SESSION['usertype']!='admin') echo "disabled"; ?>" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
                                <i class="fa fa-trash"></i> Excluir
                            </a>

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
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>