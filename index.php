<?php
include('session.php');
?>
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var jsonData = $.ajax({
          url: "charts/getData.php",
          dataType:"json",
          async: false
          }).responseText;

      var jsonData2 = $.ajax({
          url: "charts/getData2.php",
          dataType:"json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
       var options = {'title':'Os 10 cursos mais procurados na Mansão Rubi',
                     'width':800,
                     'height':400};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);

      // Create our data table out of JSON data loaded from server.
      var data2 = new google.visualization.DataTable(jsonData2);
       var options2 = {'title':'Maiores clientes',
                     'width':800,
                     'height':400};

      // Instantiate and draw our chart, passing in some options.
      var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
      chart2.draw(data2, options2);
    }

    </script>

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

        <a class="anchor" id="a-competencies"></a>
    <!-- /.row -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sectionTitle">Preenchimento dos cursos</div>
                    <div id="skillgraph" class="panel panel-default row">
                        <div class='panel-title text-Left '></div>
                        <div class='row skill-row'>
                            <span class='skillLabel'>Astrologia</span>
                            <span class='skillData-Wrapper'>
                        <span class='skillData bg-blue text-center' data-percent='80'>80%</span></span>

                        </div>
                        <div class='row skill-row'>
                            <span class='skillLabel'>Kabbalah </span>
                            <span class='skillData-Wrapper'>
                            <span class='skillData bg-rust' data-percent='60'>60%</span></span>
                        </div>
                        <div class='row skill-row'>
                            <span class='skillLabel'>Reiki</span>
                            <span class='skillData-Wrapper'>
                            <span class='skillData bg-blue' data-percent='40'>40%</span></span>
                        </div>
                        <div class='row skill-row'>
                            <span class='skillLabel'>Runas</span>
                            <span class='skillData-Wrapper'>
                            <span class='skillData bg-rust' data-percent='20'>20%</span></span>
                        </div>
                    </div>

                </div>
            </div>
             <div class="row">
                    <div class="col-sm-12 col-md-10 well">
                        <div id="chart_div"></div>
                    </div>
                    <div class="col-sm-12 col-md-10 well">
                        <div id="chart_div2"></div>
                    </div>
            </div>

        </div>
        <!-- /.container -->
    </section>
    </div>


<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>