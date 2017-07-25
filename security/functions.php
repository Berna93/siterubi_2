<?php
require_once('../config.php');
require_once(DBAPI);

function add() {

  if (!empty($_POST['user'])) {

    try {
         $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $user = $_POST['user'];
    $user['modification_date_dt'] = $user['creation_date_dt'] = $today->format("Y-m-d H:i:s");

     foreach ($user as $key => $value) {
        if($key=="'password_var'") {
           $hashed_password = password_hash($value, PASSWORD_DEFAULT);
           $user["'password_var'"] = $hashed_password;
        }
      }
    //save('tbl_costs', $cost);
    insert_user($user);

      $_SESSION['message'] = "Usuário cadastrado com sucesso!";
      $_SESSION['type'] = 'success';
    header('location: add_user.php');
    die();
    } catch (PDOException $e) {
       $_SESSION['message'] = "Não foi possível inserir usuário. Erro no banco de dados. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    } catch (Exception $e) {
       $_SESSION['message'] = "Não foi possível inserir usuário. Erro na aplicação. Exceção: " . $e->GetMessage();
       $_SESSION['type'] = 'danger';
    }

  }
}

?>