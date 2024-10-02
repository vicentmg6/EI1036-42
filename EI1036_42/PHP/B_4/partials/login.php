<?php
/**
 * * Descripción: Fichero de login
 * *
 * * Descripción extensa: Donde controlamos la autentificación, que sea correcta y que tipo(usuario, admin, ...)
 * *
 * * @author  Javier <al404921@uji.es> Vicent <al405660@uji.es>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 3
 * * Si la URL tiene este esquema http://xxxx/portal0?action=fregistro
 * * mostrara el formulario de registro. Si no hay nada la página principal.
 **/

    session_start();
    session_name("MiprimeraSesi");
    //require_once(dirname(__FILE__).'/sessions.php');
    require_once(dirname(__FILE__).'/lib_utilidades.php');
     switch($_REQUEST['action']){
        case 'login':
            if(autentificación_ok(dirname(__FILE__).'/../recursos/seguro/users.csv',$username,$password)){
                session_destroy();
            } 
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
                $central = "/home.php";
            }
            else{
                $central = "/form_login.php";
            }
            break;
        case 'logout':
            session_destroy();
            $central = "/home.php";
     }

     require_once(dirname(__FILE__).$central);
?>
