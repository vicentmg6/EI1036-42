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
	<h1>Gestión de Actividades </h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">
		<legend>Datos básicos</legend>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" required class="item_requerid" size="20" maxlength="25" placeholder="NOMBRE"
		 placeholder="Actividad1" />
		<br/>
		<label for="correo">Identificador</label>
		<br/>
		<input type="text" name="correo" class="item_requerid" size="8" maxlength="8" pattern="\d{7}[A-Z,Ñ]" placeholder="000000BB" />
		<br/>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
	</form>
</main>