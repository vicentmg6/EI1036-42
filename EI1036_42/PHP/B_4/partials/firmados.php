<!--
 * * Descripción: Fichero PHP que gestiona las firmas del formulario
 * *
 * * Descripción extensa: Se comprueba que las imagenes sean correctas
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->

<?php
var_dump ($_FILES );
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $destino = "./media/firmas/".$_FILES["foto_cliente"]["name"];

    $directorioPDF = './media/firmas';

    // try {
    //     move_uploaded_file($_FILES["foto_cliente"]['tmp_name'],$destino);
    // }
    // catch (Exception $E){
    //     print($E -> getMessage());
    // }
} 