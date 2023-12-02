<!--
 * * Descripción: Fichero HTML/PHP para añadir un curso.
 * *
 * * Descripción extensa: Se crea el formulario con los campos necesarios y sus requisitos para añadir un curso.
 * *
 * * @author  Javier <al404921@uji.es>  Vicent <al405660@uji.es>
 * * @copyright 2023 Javier y Vicent
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * *
-->

        <h1>Gestión de Cursos</h1>

        <form action="?action=registro" method="POST" class="formulario" enctype="multipart/form-data">
            <legend>Datos del curso</legend>
            <label for="codigo">Código</label>
            <br/>
            <input type="text" id="codigo" name="codigo" required class="item_requerid" size="20" maxlength="25" placeholder="BB0000"
                pattern="[A-Z,Ñ][A-Z,Ñ]\d{4}"/>
            <br/>
            <label for="descripcion">Descripción</label>
            <br/>
            <textarea id="descripcion" name="descripcion" requirows=4 cols=50 maxlength="300" placeholder="Breve descripción"></textarea>
            <br/>
            <label for="numeromax">Número Alumnos Máximo</label>
            <br/>
            <input type="number" id="numeromax" name="numeromax" min="1">
            <br/>
            <label for="numerovac">Número Plazas Vacantes</label>
            <br/>
            <input type="number" id="numerovac" name="numerovac" min="0">
            <br/>
            <label for="precio">Precio</label>
            <br/>
            <input type="number" id="precio" name="precio" min="0">
            <br/>
            <label for="name_foto" id="name_foto" name="name_foto">Nombre de foto</label>
            <br/>
            <input type="text" name="name_foto" id="name" class="item_requerid" size="20" maxlength="25">
            <br/>
            <label for="foto_cliente" id="foto_cliente" name="foto_cliente">Selección Foto</label>
            <br/>
            <input type="file" accept="image/*" name="foto_cliente" id="upload">
            <br/>

            <input type="submit" value="Añadir" class="botonform">
        </form>
        
        <script>
            function mostrarFoto(nodo, imagen) {
                var reader = new FileReader();
                reader.addEventListener("load", function () {
                imagen.src = reader.result;
                });
                reader.readAsDataURL(nodo.files[0]);
            }
        
            function getMousePos(canvas, evt) {
                var rect = canvas.getBoundingClientRect();
                return {
                x: evt.clientX - rect.left,
                y: evt.clientY - rect.top,
                };
            }
        
            function limpiar(context, canvas) {
                context.clearRect(0, 0, canvas.width, canvas.height);
            }
            
            function dibuja(context) {
                context.fillStyle = "rgb(200,0,0)";
                context.fillRect(20, 10, 40, 40);
            }
            function dibujaEnRaton(context, coors) {
                context.fillStyle = "rgb(200,200,0)";
                context.fillRect(coors.x, coors.y, 10, 31);
            }
            function activarCanvas(imagen){
                var canvas = document.querySelector("#sketchpad");
                var context = canvas.getContext("2d");
                canvas.addEventListener("click", function (evt) {
                coors = getMousePos(canvas, evt);
                dibujaEnRaton(context, coors);
                });
            
                document.querySelector("#dibujar").addEventListener("click", function () {
                dibuja(context);
                });
                document.querySelector("#copiar").addEventListener("click", function () {
                context.drawImage(imagen, 0, 0, 600, 500);
                });
                document.querySelector("#limpiar").addEventListener("click", function () {
                limpiar(context, canvas);
                });
                document.querySelector("#guardar").addEventListener("click", function () {
                imagen.src = canvas.toDataURL("image/png");
                });
            }
            function ready() {
                var imagen = null;
                var fichero = document.querySelector("#upload");
                var child = document.createElement("img");
                child.setAttribute("width", "600px");
                child.setAttribute("hight", "500px");
                child.setAttribute("background-color", "lightblue");
                child.setAttribute("id", "imagen");
                imagen = fichero.parentNode.appendChild(child);
                fichero.addEventListener("change", function (event) {
                if (fichero.files[0]["type"] == "image/png") 
                    {mostrarFoto(this, imagen);
                    }
                else alert("Seleccione una imagen PNG");
                });
                //activarCanvas(imagen);
            
            }

            
            ready();

        </script> 
        