<!DOCTYPE html>
<html lang="es">
    <?php
    /**
 * * Descripción: Listado de administrador
 * *
 * * Descripción extensa: Listado que se muestra al administrador donde puede modificar o borrar cursos
 * *
 * * @author  Javier <al404921@uji.es> Vicent <al405660@uji.es>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 3
 * * Si la URL tiene este esquema http://xxxx/portal0?action=fregistro
 * * mostrara el formulario de registro. Si no hay nada la página principal.
 **/
?>

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
            <th>Foto</th>
        </tr>
        <?php
            require_once(dirname(__FILE__).'/lib_utilidades.php');
            $curso = $_REQUEST["curso"];
            $action = $_REQUEST["action"];  
            var_dump($_REQUEST);
            if($curso != null and $action != "borrar"){
                $dicc= array(
                    "descripcion" => $_REQUEST["descripcion"],
                    "numeromax" => $_REQUEST["numeromax"],
                    "numerovac" => $_REQUEST["numerovac"],
                    "precio" => $_REQUEST["precio"],
                    "foto_cliente" => $_REQUEST["foto_cliente"]
                );
                var_dump($dicc);
                try {
                    //var_dump($_REQUEST["destino"]);
                    $f_c = $_REQUEST["foto_cliente"];
                    move_uploaded_file($_FILES["foto_cliente"]['tmp_name'],'./media/fotos/'.$f_c);
                }
                catch (Exception $E){
                    print($E -> getMessage());
                }
                $file = './recursos/cursos.json';
                $data = carregar_dades($file);
                unset($data[$curso]);
                $data[$curso][] = $dicc;
                guarda_dades($data,$file); 
            } 
            
            $file = './recursos/cursos.json';
            $data = carregar_dades($file);

            foreach($data as $clave => $valor){

                
                echo '<tr>';
                echo '<form id="form'.$clave.'" action="?action=registrar"  method="GET">';
                echo '<td><input type="text" id="curso" name="curso" value='.$clave.' readonly></td>';
                echo '<td><textarea id="descripcion" name="descripcion" requirows=4 cols=50 maxlength="300" placeholder="' .$valor[0]["descripcion"]. '" value="' .$valor[0]["descripcion"]. '" ></textarea></td>';
                echo '<td><input type="number" id="numeromax" name="numeromax" min="1" value="' .$valor[0]["numeromax"].'" placeholder="' .$valor[0]["numeromax"]. '"></td>';
                echo '<td><input type="number" id="numerovac" name="numerovac" min="0" value="' .$valor[0]["numerovac"]. '" placeholder="' .$valor[0]["numerovac"]. '"></td>';
                echo '<td><input type="number" id="precio" name="precio" min="0" value="' .$valor[0]["precio"].'" placeholder="' .$valor[0]["precio"]. '"></td>';
                echo '<td class="listado"><img src="'.$valor[0]["foto_cliente"].'" alt="Imagen No Encontrada" height="100" width="100"></td>';

                echo '<td><input type="file" accept="image/*" name="foto_cliente" id="upload"></td>';
                echo '<td><input type="submit" name="action" value="registrar" class="botonform"></td>';
                echo '<td><input type="submit" name="action" value="borrar" formaction="?action=borrar" class="botonform"></td>';
                
                echo '</form>';
                echo '</tr>';
            }
             
        ?>
    </table>
</body>
</html>
