<!--
 * * Descripción: Fichero HTML/PHP que representa el home o página por defecto.
 * *
 * * Descripción extensa: Se compone de un título de bienvenida con una imagen del centro y se indica
 * * que los usuarios realicen las acciones que deseen.
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->
<?php
     session_name("MiprimeraSesi");
     session_start();
     if (!isset($_SESSION['visitados'])) {
        $_SESSION['visitados'] = array() ;
     }
     $URL = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
     array_push($_SESSION['visitados'] , $URL);
?>
<main>
	<h2>Bienvenidos</h2>
	<p>Visita todas nuestras seciones </p>
	<img src="./media/centro.png" id="logo2" alt="logo2" />
</main>
