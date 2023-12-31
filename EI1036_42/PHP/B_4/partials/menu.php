<!--
 * * Descripción: Fichero HTML/PHP que representa las diferentes opciones que el usuario puede realizar en la página.
 * *
 * * Descripción extensa: En este fichero se encuentran todas las opciones de la página y como funciona la
 * * redireccionan cuando un usuario pincha en una de las opciones.
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->

<nav>
	<ul>
		<li>
			<a href="?action=home">Home</a>
		</li>
		<li>
			<a href="?action=listar">Listado</a>
		</li>
		<li>
			<a href="?action=registrar">Registrar</a>
		</li>
		<li>
			<a href="?action=galeria">Galería</a>
		</li>
		<li>
			<a href="?action=lgpd">LGPD</a>
		</li>
		<li>
			<a href="?action=qui_som">Quiénes Somos</a>
		</li>
		<li>
			<a href="?action=subir_foto">Subir Foto</a>
		</li>
		<!-- <li>
			<a href="?action=juego">Juego3.3</a>
		</li> -->
		<li>
			<a href="?action=firma">Firma</a>
		</li>
		<!-- <li>
			<a href="?action=juego4">Juego4</a>
		</li> -->
		<?php
		if ($_SESSION["user_role"] == "client") {
			?>
			<li>
				<a href="?action=form_matricula">Matricular</a>
			</li>
		<?php } ?> 
	</ul>
</nav>
