<?php
include('../session.php');
?>
<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>


<?php if ($db) : ?>
<div class="col-lg-12">
                <h1 class="page-header">Cadastro de Cursos</h1>
            </div>
<div id="page-wrapper">

            <!-- Page Heading -->

        <div class="row">

            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Dados básicos
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <form role="form" action="cadastroCurso.php" data-toggle="validator" method="post">
                                    <div class="form-group">
                                        <label>Nome do Curso</label>
                                        <input type="text" class="form-control" name="curso['nome']" data-error="Por favor, informe um nome de curso válido." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Professor/Palestrante</label>
                                        <input type="text" class="form-control" name="curso['professor']" data-error="Por favor, informe um nome de professor/palestrante válido."  required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantidade de Vagas</label>
                                        <input type="number" min="1" max="100" class="form-control" name="curso['qtdeVagas']" data-error="Por favor, informe uma quantidade de vagas válida (entre 1 e 100)."  required>
                                        <p class="help-block">Apenas números</p>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Valor do Curso</label>
                                        <input type="text" class="form-control" name="curso['valor']" data-error="Por favor, informe um valor de curso válido."  data-mask="000.000.000.000.000,00" data-mask-reverse="true" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Data do Curso</label>

                                        <input type="date" class="form-control" name="curso['data']"  data-error="Por favor, informe a data do curso." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">

                                        <label>Contrato</label>
                                        <textarea class="form-control" rows="30" name="curso['contrato']"  data-error="É preciso informar um contrato padrão para este curso." required></textarea>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>