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
require_once(dirname(__FILE__) . '/partials/lib_utilidades.php');


require_once(dirname(__FILE__) . "/partials/header.php");
require_once(dirname(__FILE__) . "/partials/menu.php");


if (!autorización()) {
    ?>
    <div id=loguear>
        <a href="?action=login">Entrar</a>
    </div>
    <?php
} else {
    ?>
    <div id=loguear>
        <a href="?action=logout">Salir</a>
    </div>
    <?php
}



$action = (array_key_exists('action', $_REQUEST)) ? $_REQUEST["action"] : "home";


if (isset($_REQUEST["action"])) {
    if (empty($_SERVER['HTTP_REFERER'])) {
        $error_msg = "Acción directa no permitida";
        $central = "/partials/home.php";
    } else {
        switch ($action) {
            case "home":
                $central = "/partials/home.php";
                break;
            case "registrar":
                if ($_SESSION["user_role"] == "admin") {
                    $curso = $_REQUEST["curso"];
                    if ($curso == null) {
                        $central = "/partials/form_cursos.php";
                    } else {
                        $central = "/partials/listar_admin.php";
                    }
                } else {
                    $error_msg = "Acceso no permitido";
                    $central = "/partials/home.php";
                }
                break;
            case "registro":
                require_once(dirname(__FILE__) . "/partials/cursos.php");
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
                if ($_SESSION["user_role"] == "admin") {
                    $central = "/partials/listar_admin.php";
                } else {
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
                if ($_SESSION["user_role"] == "admin") {
                    $curso = $_REQUEST["curso"];
                    if ($curso != null) {
                        $file = './recursos/cursos.json';
                        $data = carregar_dades($file);
                        unset($data[$curso]); //BORRAR CURSO CONTANDO QUE EN $CURSO SEA UN ARRAY CON CODIGO, NUM ALUM, ETC 
                        guarda_dades($data, $file);
                        $central = "/partials/listar_admin.php";
                        break;
                    }
                }
                break;
            case "foto_upload":
                var_dump($_FILES);
                $destino = "./media/fotos/" . $_FILES["foto_cliente"]["name"];
                move_uploaded_file($_FILES["foto_cliente"]['tmp_name'], $destino);
                break;
            case "subir_foto":
                $central = "/partials/form_foto.php";
                break;
            case "juego":
                $central = "/partials/juego.html";
                break;
            case "firma":
                $central = "/partials/firma_online.html";
                break;
            case "firmado":
                require_once(dirname(__FILE__) . "/partials/firmados.php");
                $central = "/partials/home.php";
                break;
            case "juego4":
                $central = "/partials/juego4.html";
                break;
            case "matricular":
                $central = "/partials/form_mat_cursos.html";
                break;
            default:
                $error_msg = "Accion no permitida";
                $central = "/partials/home.php";
        }
    }
} else {
    $central = "/partials/home.php";
}

if (isset($error_msg))
    require_once(dirname(__FILE__) . "/partials/error.php");
require_once(dirname(__FILE__) . $central);
//echo "<br />",$action,"<br />",dirname(__FILE__),"<br />";
?>
<br><br>
<aside>
    <h2>Portal de Noticias</h2>
    <p><a href="https://www.uji.es/com/noticies/2023/10/1q/premis-smart-ports/"><img src="/media/N1.png"
                alt="Noticia 1"></a>
        <a
            href="https://www.elperiodicomediterraneo.com/formacion/universidades/2023/09/30/talento-servicio-salud-92708475.html"><img
                src="/media/ndos.png" alt="Noticia 2"></a>
        <a href="https://www.uji.es/esports/base/arxiu/noticies/2023/9/treball-saludable/"><img src="/media/n3.png"
                alt="Noticia 3"></a>
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
<aside id="tiempo">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #dddddd;
        }
        th,td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
    <br>
    <h2>El Tiempo en Pepino (Toledo)</h2>
    <script type="text/javascript">
        async function cargaFech(src_url, lugar) {
            try {
                let response = await fetch(src_url)
                if (response.status !== 200) {
                    console.log('We have a problem. Status Code: ' + response.status);
                    throw new Error(response.status)
                }
                let data = await response.json(); //Funcion donde guardamos los datos de la API

                let fecha = data.fecha;
                let tiempo = data.stateSky;
                tiempo = tiempo["description"];
                let tempAct = data.temperatura_actual;
                let temperaturasaxmin = data.temperaturas;
                let tempMax = temperaturasaxmin["max"];
                let tempMin = temperaturasaxmin["min"];

                let tabla = document.createElement("table"); //Creación de la tabla y sus celdas y filas
                tabla.border = "1";

                let fila1 = tabla.insertRow(0);
                let celda1 = fila1.insertCell(0);
                celda1.innerHTML = "Fecha";
                let celda2 = fila1.insertCell(1);
                celda2.innerHTML = fecha;

                let fila2 = tabla.insertRow(1);
                let celda3 = fila2.insertCell(0);
                celda3.innerHTML = "Cielo";
                let celda4 = fila2.insertCell(1);
                celda4.innerHTML = tiempo;

                let fila3 = tabla.insertRow(2);
                let celda5 = fila3.insertCell(0);
                celda5.innerHTML = "Temperatura Actual";
                let celda6 = fila3.insertCell(1);
                celda6.innerHTML = tempAct;

                let fila4 = tabla.insertRow(3);
                let celda7 = fila4.insertCell(0);
                celda7.innerHTML = "Temperatura Máxima";
                let celda8 = fila4.insertCell(1);
                celda8.innerHTML = tempMax;

                let fila5 = tabla.insertRow(4);
                let celda9 = fila5.insertCell(0);
                celda9.innerHTML = "Temperatura Mínima";
                let celda10 = fila5.insertCell(1);
                celda10.innerHTML = tempMin;

                lugar.appendChild(tabla); //Asignar el hijo al padre

                return true;

            } catch (err) {
                console.log('Fetch Error :' + err);
                return false;
            }

        }

        function detectores() {
            let lugar = document.querySelector("#tiempo");
            let enlace = "https://www.el-tiempo.net/api/json/v2/provincias/45/municipios/45132"; //Llamada a la API
            if (cargaFech(enlace, lugar) == true) {
                console.log("Correcto!!")
            } else {
                console.log("Error al cargar los datos.");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            detectores()
        }); 
    </script>
</aside>
<aside id="recurso">
    <br>
    <h2>Recurso JSON API CHUCK NORRIS</h2>
    <script type="text/javascript">
        async function cargaFechRecurso(src_url, lugar) {
            try {
                let response = await fetch(src_url)
                if (response.status !== 200) {
                    console.log('We have a problem. Status Code: ' + response.status);
                    throw new Error(response.status)
                }
                let data = await response.json(); //Asignar a la variable data los datos de la API

                let fecha2 = data.created_at;
                let foto = data.icon_url;
                let value = data.value;

                let elemFecha = document.createElement("p");
                elemFecha.textContent = `Fecha: ${fecha2} `;
                var elemFoto = document.createElement("img");
                elemFoto.src = foto;
                let elemValue = document.createElement("p");
                elemValue.textContent = `Value: ${value} `; //Creacion de los elementos y asignacion de los valores

                lugar.appendChild(elemFecha); //Asignar los hijos al padre
                lugar.appendChild(elemFoto);
                lugar.appendChild(elemValue);


                return true;

            } catch (err) {
                console.log('Fetch Error :' + err);
                return false;
            }

        }

        function detectoresRecurso() {
            let lugar = document.querySelector("#recurso");
            let enlace = "https://api.chucknorris.io/jokes/random";
            if (cargaFechRecurso(enlace, lugar) == true) {
                console.log("Correcto!!")
            } else {
                console.log("Error al cargar los datos.");
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            detectoresRecurso()
        }); 
    </script>
</aside>
<?php
require_once(dirname(__FILE__) . "/partials/footer.php");
?>

</html>