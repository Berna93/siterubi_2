<?php
include('session.php');
?>
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>


<?php if ($db) : ?>

<div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                        <div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-user"></i>
                </div>
                <div class="text">
                    <var>147</var>
                    <label class="text-muted">clientes registrados</label>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-star"></i>
                </div>
                <div class="text">
                    <var>614</var>
                    <label class="text-muted">curtidas na página</label>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="fa fa-fw fa-graduation-cap"></i>
                </div>
                <div class="text">
                    <var>3</var>
                    <label class="text-muted">cursos em aberto</label>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="fa fa-fw fa-dollar"></i>
                </div>
                <div class="text">
                    <var>8345</var>
                    <label class="text-muted">lucro previsto (mês)</label>
                </div>

            </div>
        </div>
    </div>
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