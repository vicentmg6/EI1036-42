<!--
 * * Descripción: Fichero HTML/PHP para añadir un curso.
 * *
 * * Descripción extensa: Se crea el formulario con los campos necesarios y sus requisitos para añadir un curso.
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->

        <h1>Gestión de Cursos</h1>

        <form action="?action=registro" method="POST" class="formulario" enctype="multipart/form-data">
            <legend>Datos del curso</legend>
            <label for="codigo">Código</label>
            <br/>
            <input type="text" id="codigo" name="codigo" required class="item_requerid" size="20" maxlength="25" placeholder="BB0000"
                pattern="[A-Z,Ñ][A-Z,Ñ]\d{4}"/>
            <br/>
            <label for="descripcion">Descripción</label>
            <br/>
            <textarea id="descripcion" name="descripcion" requirows=4 cols=50 maxlength="300" placeholder="Breve descripción"></textarea>
            <br/>
            <label for="numeromax">Número Alumnos Máximo</label>
            <br/>
            <input type="number" id="numeromax" name="numeromax" min="1">
            <br/>
            <label for="numerovac">Número Plazas Vacantes</label>
            <br/>
            <input type="number" id="numerovac" name="numerovac" min="0">
            <br/>
            <label for="precio">Precio</label>
            <br/>
            <input type="number" id="precio" name="precio" min="0">
            <br/>
            <label for="name_foto" id="name_foto" name="name_foto">Nombre de foto</label>
            <br/>
            <input type="text" name="name_foto" id="name" class="item_requerid" size="20" maxlength="25">
            <br/>
            <label for="foto_cliente" id="foto_cliente" name="foto_cliente">Selección Foto</label>
            <br/>
            <input type="file" accept="image/*" name="foto_cliente" id="upload">
            <br/>

            <input type="submit" value="Añadir" class="botonform">
        </form>
