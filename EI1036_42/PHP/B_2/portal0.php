<!DOCTYPE html>
<html>   
<?php
/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Javier <al404921@uji.es> Vicent <al405660@uji.es>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 3
 * * Si la URL tiene este esquema http://xxxx/portal0?action=fregistro
 * * mostrara el formulario de registro. Si no hay nada la página principal.
 **/

    session_name("MiprimeraSesi");
    session_start();
    require_once(dirname(__FILE__).'/partials/lib_utilidades.php');


    require_once(dirname(__FILE__)."/partials/header.php");
    require_once(dirname(__FILE__)."/partials/menu.php");


    if (!autorización()){
        ?> <div id=loguear>
                <a href="?action=login">Entrar</a>
            </div>
        <?php
    }
    else{
        ?> <div id=loguear>
                <a href="?action=logout">Salir</a>
            </div>
        <?php
    }



    $action = (array_key_exists('action', $_REQUEST)) ? $_REQUEST["action"] : "home";


    if (isset($_REQUEST["action"])){
        if(empty($_SERVER['HTTP_REFERER'])){
            $error_msg = "Acción directa no permitida";
            $central = "/partials/home.php";
        }
        else{
            switch ($action) {
                case "home":
                    $central = "/partials/home.php";
                    break;
                case "registrar":
                    if($_SESSION["user_role"] == "admin"){
                        $curso = $_REQUEST["curso"];
                        if($curso == null){
                        $central = "/partials/form_cursos.php";
                        }
                        else{
                            $central = "/partials/listar_admin.php";
                        }
                    }
                    else{
                        echo "Acceso no permitido";
                        $central = "/partials/home.php";
                    }
                    break;
                case "registro":
                    require_once(dirname(__FILE__)."/partials/cursos.php");
                    $central = "/partials/listar.php";
                    break;
                case "qui_som":
                    $central = "/partials/qui_som.php";
                    break;
                case "lgpd":
                    $central = "/partials/lgpd.php";
                    break;
                case "galeria":
                    $central = "/partials/galeria.php";
                    break;
                case "listar":
                    if($_SESSION["user_role"] == "admin"){
                        $central = "/partials/listar_admin.php";
                    } 
                    else{
                        $central = "/partials/listar.php";
                    } 
                    break;
                case "login":
                    $central = "/partials/login.php";
                    break;
                case "form_login":
                    $central = "/partials/form_login.php";
                    break;
                case "auten":
                    $central = "/partials/login.php";
                    break;
                case "logout":
                    $central = "/partials/login.php";
                    break;
                case "borrar":
                    if($_SESSION["user_role"] == "admin"){
                        $curso = $_REQUEST["curso"];
                        if($curso != null){
                            $file = './recursos/cursos.json';
                            $data = carregar_dades($file);
                            unset($data[$curso]); //BORRAR CURSO CONTANDO QUE EN $CURSO SEA UN ARRAY CON CODIGO, NUM ALUM, ETC 
                            guarda_dades($data,$file);
                            $central = "/partials/listar_admin.php";
                            break;
                            }
                        }                  
                    break; 
                case "foto_upload":
                    var_dump($_FILES);
                    $destino = "./media/fotos/".$_FILES["foto_cliente"]["name"] ;
                    move_uploaded_file($_FILES["foto_cliente"]['tmp_name'],$destino);
                case "subir_foto":
                    $central = "/partials/form_foto.php";
                    break;
                default:
                    $error_msg="Accion no permitida";
                    $central = "/partials/home.php";
            }
        }
    }

    if (isset($error_msg)) 
        require_once(dirname(__FILE__)."/partials/error.php");
    require_once(dirname(__FILE__).$central);
    //echo "<br />",$action,"<br />",dirname(__FILE__),"<br />";
?>
<br><br>
<aside>
        <h2>Portal de Noticias</h2>
        <p><a href="https://www.uji.es/com/noticies/2023/10/1q/premis-smart-ports/"><img src="/media/N1.png" alt="Noticia 1"></a>
			<a href="https://www.elperiodicomediterraneo.com/formacion/universidades/2023/09/30/talento-servicio-salud-92708475.html"><img src="/media/ndos.png" alt="Noticia 2"></a>
			<a href="https://www.uji.es/esports/base/arxiu/noticies/2023/9/treball-saludable/"><img src="/media/n3.png" alt="Noticia 3"></a>
		</p>
</aside>
<aside class="ej14">
    <?php
    $imagenes = array(
    "./media/N1.PNG",
    "./media/centro.png",
    "./media/ej2.png",
    "./media/ejemplo.png",
    "./media/favicon.ico",
    "./media/imagen1.png",
    "./media/imagen17.png",
    "./media/n3.PNG",
    "./media/ndos.PNG",
    "./media/univ1.jpeg",
    "./media/univ10.jpeg",
    "./media/univ11.jpeg",
    "./media/univ12.jpeg",
    "./media/univ2.jpeg",
    "./media/univ3.jpeg",
    "./media/univ4.jpeg",
    "./media/univ5.jpeg",
    "./media/univ6.jpeg",
    "./media/univ7.jpeg",
    "./media/univ8.jpeg",
    "./media/univ9.jpeg"
    );

    shuffle($imagenes);

     for ($i = 0; $i < min(9, count($imagenes)); $i++) {
        echo '<img class="bordes" src="' . $imagenes[$i] . '" alt="Imagen ' . ($i + 1) . '">';
     }
     ?>
</aside>
<?php
    require_once(dirname(__FILE__)."/partials/footer.php");
?>

</html>
