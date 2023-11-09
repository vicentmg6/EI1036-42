<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Cursos Admin</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>
<body>
    <h1>Listado de cursos Admin</h1>

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
                echo '<form action="?action=registrar"  method="POST">';
                echo '</tr>';

                
                echo "<input type='submit' name='modificar' value='Modificar'>";
                echo "<input type='submit' name='borrar' value='Borrar'>";
                echo "</form>";
            }
             
        ?>
    </table>
</body>
</html>
