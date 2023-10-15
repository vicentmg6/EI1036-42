/**
 * * Descripción: Fichero HTML/PHP para añadir un curso.
 * *
 * * Descripción extensa: Se crea el formulario con los campos necesarios y sus requisitos para añadir un curso.
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
 **/


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Form Cursos</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>

<h1>Gestión de Cursos</h1>

<form action="/partials/cursos.php" method="POST" class="formulario">
    <legend>Datos del curso</legend>
    <label for="codigo">Código</label>
    <br/>
    <input type="text" name="codigo" required class="item_requerid" size="20" maxlength="25" placeholder="Código"
		 placeholder="Actividad1" />
    <br/>
    <label for="descripcion">Descripción</label>
    <br/>
    <textarea id="descripcion" name="descripcion" rows=4 cols=50 maxlength="300" placeholder="Breve descripción"></textarea>
    <br/>
    <label for="alumnosmax">Número Alumnos Máximo</label>
    <br/>
    <input type="number" id="numeromax" name="numeromax" min="1">
    <br/>
    <label for="vacantes">Número Plazas Vacantes</label>
    <br/>
    <input type="number" id="numerovac" name="numerovac" min="0">
    <br/>
    <label for="precio">Precio</label>
    <br/>
    <input type="number" id="precio" name="precio" min="0">
    <br/>

    <input type="submit" value="Añadir" class="botonform">
</form>
