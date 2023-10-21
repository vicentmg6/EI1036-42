<!--
 * * Descripción: Formulario de login
 * *
 * * Descripción extensa: Formulario donde los usuarios se loguean, escriben su usario y contraseña.
 * *
 * * @author  Javier <al404921@uji.es> Vicent <al405660@uji.es>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 3
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
	<h1>Login </h1>
	<form class="form_usuario" action="?action=auten" method="POST">
		<label for="user">Usuario</label>
		<input type="text" size="10" id="user" name="user"/></br>
		<label for="pass" >Contraseña: <input type="password" size="10"  id="pass" name="pass"/>
		<br/>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
	</form>
