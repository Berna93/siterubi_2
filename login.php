<?php
   include("config.php");
   session_start();


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM tbl_users WHERE username_var = '$myusername' and password_var = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

         $_SESSION['login_user'] = $myusername;

         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<link rel="stylesheet" href="css/styleLogin.css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row login_box">
        <div class="col-md-6 col-xs-6" align="center">
            <div class="line"><h3><?php date_default_timezone_set('America/Sao_Paulo'); echo date("H:i"); ?></h3></div>
            <div class="outter"><img src="imgs/logo.jpg" class="image-circle"/></div>
            <h1>Seja bem vindo (a)</h1>
            <span>Mansão Rubi - Desenvolvimento Humano e Sustentável</span>
        </div>
        <div class="col-md-6 col-xs-6 follow line" align="center">
            <h3>
                 125651 <br/> <span>SEGUIDORES</span>
            </h3>
        </div>

        <div class="col-md-12 col-xs-12 login_control">
            <form role="form" action="" method="post">
                <div class="control">
                    <div class="label">Usuário</div>
                    <input type="text" class="form-control" name="username" value="mansao"/>
                </div>

                <div class="control">
                     <div class="label">Senha</div>
                    <input type="password" class="form-control" name="password" value="123456"/>
                </div>
                <div align="center">
                     <button class="btn btn-orange">LOGIN</button>
                </div>
            </form>
        </div>



    </div>
</div>