/**
 * * Descripción: Fichero PHP que gestiona la entrada de los datos del formulario
 * *
 * * Descripción extensa: Se comprueba que los datos sean correctos, o no estén repetidos y se añaden al fichero JSON
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
 **/


<!DOCTYPE html>
<html>
<body>
<?php
$dict =[]; 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    // Obtener los datos del formulario
    $codigo = $_POST["codigo"];
    $descripcion = $_POST["descripcion"];
    $numeromax= $_POST["numeromax"];
    $numerovac= $_POST["numerovac"];
    $precio= $_POST["precio"];

    if ($numerovac <= $numeromax){
        $datos= array(
            "descripcion" => $descripcion,
            "numeromax" => $numeromax,
            "numerovac" => $numerovac,
            "precio" => $precio
        );


        $file = 'file.json';
        $contenido = file_get_contents($file);

        $data = json_decode($contenido, true);

        if (!(array_key_exists($codigo,$data))){
            $data[$codigo][] = $datos; 

            $jsonData = json_encode($data, JSON_PRETTY_PRINT);

            file_put_contents($file, $jsonData);
            echo "Los datos se han introducido correctamente.";
        }
        else{
            echo "ERROR: Ya existe un curso con ese mismo código.";
        } 
    } 
    else{
        echo "ERROR: Las plazas vacantes no pueden ser mayores que el número de alumnos máximos.";
    }
    ?>
    <br>
    <a href="/portal0.php?action=form_cursos" class="button">Volver</a>
</body>
</html>
