<?php

    //require_once(dirname(__FILE__).'/sessions.php');
    require_once(dirname(__FILE__).'/lib_utilidades.php');
     switch($_REQUEST['action']){
        case 'login':
            $central = "/form_login.php";
            break;
        case 'auten':
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST['user'];
                $password = $_POST['pass'];
            } 
            if (autentificación_ok(dirname(__FILE__).'/../recursos/seguro/users.csv',$username,$password)){
                $aux = $_SESSION["user_name"];
                echo("Bienvenido/a $aux");
            }
            else{
                $central = "/form_login.php";
            }
            break;
     }

     require_once(dirname(__FILE__).$central);
?>
