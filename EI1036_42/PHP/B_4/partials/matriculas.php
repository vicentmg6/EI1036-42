<!--
 * * Descripción: Fichero PHP que gestiona las matriculas
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
$error = True;

if ($_SERVER["REQUEST_METHOD"] == "GET") { 
    $curso = $_GET["curso"];
    $user = $_GET["user"];
    
    $file = './recursos/cursos.json'; //Carga cursos.json
    $data = carregar_dades($file);

    $numerovacantes = $data[$curso]["numerovac"];

    if ($numerovacantes > 0) {
        $error = False;
        $numerovacantes--;
        $data[$curso]["numerovac"] = $numerovacantes;
        guarda_dades($data,$file);

        $file2 = './recursos/matriculados.json';
        $data2 = carregar_dades($file2);

        if (!(array_key_exists($curso,$data2))) //Si no existe la clave, se crea y se añade el usuario
            $data2[$curso] = array();  
        $data2[$curso][] = $user; 
        guarda_dades($data2,$file2);
    } 
    if ($error){ //Gestion de los errores
        $respuesta = array("matricula" => "incorrecta", "mensaje" => "Se produjo un error al procesar la matrícula.");
    } 
    else {
        $respuesta = array("matricula" => "correcta");
    }

    header('Content-Type: application/json');
    echo json_encode($respuesta);
}



         