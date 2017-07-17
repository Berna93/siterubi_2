<?php
include('../session.php');
?>
<?php
  require_once('functions.php');
  calculate();
  getCashFlow();
?>

<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>


<?php if ($db) : ?>

 <div class="row">
  <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                        <div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="hero-widget well well-sm" style="background-color: #ff4d4d">
                <div class="icon">
                     <i class="glyphicon glyphicon-minus"></i>
                </div>
                <div class="text">
                    <var style="color: #ffffff">R$ <?php if(isset($month_flow)) { echo $month_flow['costs_int']; } ?></var>
                    <label class="text-muted" style="color: #ffffff">Despesas (mês)</label>
                </div>

            </div>
        </div>

        <div class="col-sm-3">
            <div class="hero-widget well well-sm" style="background-color: #80aaff">
                <div class="icon">
                     <i class="glyphicon glyphicon-plus"></i>
                </div>
                <div class="text" >
                    <var style="color: #ffffff">R$ <?php if(isset($month_flow)) { echo $month_flow['income_int']; } ?></var>
                    <label class="text-muted" style="color: #ffffff">Receita (mês)</label>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="hero-widget well well-sm" style="background-color: #5cd65c">
                <div class="icon">
                     <i class="glyphicon glyphicon-usd"></i>
                </div>
                <div class="text" >
                    <var style="color: #ffffff"> R$ <?php if(isset($month_flow)) { echo $month_flow['balance_int']; } ?></var>
                    <label class="text-muted" style="color: #ffffff">Saldo Previsto (mês)</label>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
            </div>
<?php else : ?>
     <div class="alert alert-danger" role="alert">
                <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
            </div>

        <?php endif; ?>


        <?php include(FOOTER_TEMPLATE); ?>