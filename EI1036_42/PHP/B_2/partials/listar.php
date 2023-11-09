<!--
 * * Descripción: Fichero PHP que muestra el listado de cursos.
 * *
 * * Descripción extensa: Este fichero muestra el listado de los 5 primeros cursos que se encuentran ofertados
 * * con todos los datos requeridos en forma de tabla.
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->
 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Cursos</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>
<body>
    <h1>Listado de cursos</h1>

    <table class="lista">
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Número Máximo de Alumnos</th>
            <th>Plazas Vacantes</th>
            <th>Precio</th>
        </tr>
        <?php
            require_once(dirname(__FILE__).'/lib_utilidades.php');
            $file = './recursos/cursos.json';
            $data = carregar_dades($file);

            foreach($data as $clave => $valor){

                echo '<tr>';
                echo '<td class="listado">' . $clave . '</td>';
                echo '<td class="listado">' . $valor[0]["descripcion"] . '</td>';
                echo '<td class="listado">' . $valor[0]["numeromax"]  . '</td>';
                echo '<td class="listado">' . $valor[0]["numerovac"] . '</td>';
                echo '<td class="listado">' . $valor[0]["precio"] . '</td>';
                echo '</tr>';

            }
             
        ?>
    </table>
</body>
</html>
