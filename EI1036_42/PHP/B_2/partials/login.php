<?php
     session_name("MiprimeraSesi");
     session_start();
     include 'lib_utilidades.php';

    if (autentificado()){
        header("Location: portal0.php?action=form_login");
        exit;
    }
    else{
        session_destroy(); 
        header("Location: portal0.php?action=form_login");
    }
?>



