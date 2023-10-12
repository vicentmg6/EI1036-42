<?php

$dict =[]; 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    // Obtener los datos del formulario
    $codigo = $_POST["codigo"];
    $descripcion = $_POST["descripcion"];
    $numeromax= $_POST["numeromax"];
    $numerovac= $_POST["numerovac"];
    $precio= $_POST["precio"];

    $datos= array(
        "descripcion" => $descripcion,
        "numeromax" => $numeromax,
        "numerovac" => $numerovac,
        "precio" => $precio
    );


    $file = 'file.json';
    $contenido = file_get_contents($file);

    $data = json_decode($contenido, true);
    $data[$codigo][] = $datos; 

    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents($file, $jsonData);

    ?>