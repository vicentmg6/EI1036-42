<!--
 * * Descripción: Formulario de matricula
 * *
 * * Descripción extensa: Fichero donde se muestra los cursos disponibles
 * *
 * * @author  Javier <al404921@uji.es> Vicent <al405660@uji.es>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 3
 * * 
-->
<?php
header('Content-type: application/json');
try {
    $file = '../recursos/cursos.json';
    $contenido = file_get_contents($file);
    $data = json_decode($contenido, true);

    $cursosVacantes = array();
    foreach ($data as $curso => $valor) {
        if ($data[$curso][0]["numerovac"] > 0) {
            $cursosVacantes[$curso] = $valor;
        }
    }

    //var_dump(json_encode($cursosVacantes, JSON_PRETTY_PRINT));
    echo json_encode($cursosVacantes, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

?>
