<!--
 * * Descripción: Fichero HTML/PHP donde se muestra la galería de imágenes.
 * *
 * * Descripción extensa: Mediante las cajas flexibles y columnas se muestra una galería de imágenes del centro educativo.
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->
<?php
     session_name("MiprimeraSesi");
     session_start();
     if (!isset($_SESSION['visitados'])) {
        $_SESSION['visitados'] = array() ;
     }
     $URL = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
     array_push($_SESSION['visitados'] , $URL);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Galería</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>

<body>
    <div class="galeria">
        <div class="imagen"><img src="./media/univ1.jpeg" alt="Imagen del centro educativo 1"></div>
        <div class="imagen"><img src="./media/univ2.jpeg" alt="Imagen del centro educativo 2"></div>
        <div class="imagen"><img src="./media/univ3.jpeg" alt="Imagen del centro educativo 3"></div>

        <div class="imagen"><img src="./media/univ4.jpeg" alt="Imagen del centro educativo 4"></div>
        <div class="imagen"><img src="./media/univ5.jpeg" alt="Imagen del centro educativo 5"></div>
        <div class="imagen"><img src="./media/univ6.jpeg" alt="Imagen del centro educativo 6"></div>
     
        <div class="imagen"><img src="./media/univ7.jpeg" alt="Imagen del centro educativo 7"></div>
        <div class="imagen"><img src="./media/univ8.jpeg" alt="Imagen del centro educativo 8"></div>
        <div class="imagen"><img src="./media/univ9.jpeg" alt="Imagen del centro educativo 9"></div>
        
        <div class="imagen"><img src="./media/univ10.jpeg" alt="Imagen del centro educativo 10"></div>
        <div class="imagen"><img src="./media/univ11.jpeg" alt="Imagen del centro educativo 11"></div>
        <div class="imagen"><img src="./media/univ12.jpeg" alt="Imagen del centro educativo 12"></div>
        
    </div>

</body>
</html>
