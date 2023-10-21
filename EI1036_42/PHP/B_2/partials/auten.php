<?php
	session_name("MiprimeraSesi");
	session_start();
    include 'lib_utilidades.php';
 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['user'];
        $password = $_POST['pass'];
    } 

    if (autentificacion_ok('./recursos/seguro/users.csv',$username,$password)){
        echo($_SESSION["user"]);
        echo($_SESSION["user_name"]);
        echo($_SESSION["user_role"]);
    } 
    else{
        header("Location: portal0.php?action=form_login");
    } 
    
?>