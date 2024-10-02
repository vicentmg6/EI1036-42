<?php
/**
 * * Descripción: Formulario para subir una foto
 * *
 * * Descripción extensa: Formulario para subir una foto y que se guarde en el directorio /media/fotos.
 * *
 * * @author  Javier <al404921@uji.es> Vicent <al405660@uji.es>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 3
 * * Si la URL tiene este esquema http://xxxx/portal0?action=fregistro
 * * mostrara el formulario de registro. Si no hay nada la página principal.
 **/
?>
<form class="fom_curso" action="?action=foto_upload" method="POST" enctype="multipart/form-data">
    <input type="text" name="name_foto" id="name" class="item_requerid" size="20" maxlength="25">
    <input type="file" accept="image/*" name="foto_cliente" id="upload">
    <input type="submit" value="Enviar">
    <input type="reset" value="Deshacer">
</form>
