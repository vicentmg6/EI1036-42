<!--
 * * Descripción: Fichero PHP que gestiona la entrada de los datos del formulario
 * *
 * * Descripción extensa: Se comprueba que los datos sean correctos, o no estén repetidos y se añaden al fichero JSON
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->

<?php
//var_dump($_FILES);
//var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    // Obtener los datos del formulario
    $codigo = $_POST["codigo"];
    $descripcion = $_POST["descripcion"];
    $numeromax= $_POST["numeromax"];
    $numerovac= $_POST["numerovac"];
    $precio= $_POST["precio"];
    $name_foto = $_POST["name_foto"];
    $destino = "../media/fotos/".$_FILES["foto_cliente"]["name"];

    if ($numerovac <= $numeromax){
        $datos= array(
            "descripcion" => $descripcion,
            "numeromax" => $numeromax,
            "numerovac" => $numerovac,
            "precio" => $precio,
            "nom_imagen" => $name_foto,
            "foto_cliente" => $destino
        );

        var_dump($_FILES);
        move_uploaded_file($_FILES["foto_cliente"]['tmp_name'],$destino);
        $file = './recursos/cursos.json';
        $data = carregar_dades($file);


        if (!(array_key_exists($codigo,$data))){
            $data[$codigo][] = $datos; 

            guarda_dades($data,$file);
            echo "Los datos se han introducido correctamente.";
            require_once(dirname(__FILE__)."/listar.php");

        }
        else{
            echo "ERROR: Ya existe un curso con ese mismo código.";
        } 
    } 
    else{
        echo "ERROR: Las plazas vacantes no pueden ser mayores que el número de alumnos máximos.";
    }
    ?>
 