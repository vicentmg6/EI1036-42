<!--
 * * Descripción: Formulario de matricula
 * *
 * * Descripción extensa: Formulario donde los usuarios se pueden matricular a un curso
 * *
 * * @author  Javier <al404921@uji.es> Vicent <al405660@uji.es>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 3
 * * 
-->
<h1>Matricula d'alumnes</h1>
<form class="formMatricula" action="?action=matricula" method="GET">
    <label for="cursos">Cursos Disponibles:</label>
    <select id="cursos" name="cursos"></select>
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">

    <div id="preciovacantes"></div>
    <br>
    <button type="button" onclick="realizarMatricula()">Apuntarse</button>
</form>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        var cursosSelect = document.getElementById('cursos');
        var precioVacantes = document.getElementById('preciovacantes');
        console.log("LLEGA 1");
        fetch('./partials/cursosDisponibles.php', {
            method: 'GET',
            credentials: 'include'
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                for (const curso in data) {
                    const option = document.createElement('option');
                    option.value = curso;
                    option.textContent = curso;
                    cursosSelect.appendChild(option);
                }

                const cursoSeleccionado = cursosSelect.value;
                const datosCurso = data[cursoSelecionado];

                precioVacantes.innerHTML = `
                Código: ${cursoSeleccionado}
                <br>
                Vacantes: ${cursoSeleccionado["numerovac"]}
                <br>
                Precio: ${$cursoSeleccionado["precio"]}
            `;
            })
            .catch(error => {
                console.error('Error al cargar cursos disponibles:', error);
            });

        // Asociar el evento change al desplegable
        cursosSelect.addEventListener('change', function () {
            // Obtener el curso seleccionado
            const cursoSeleccionado = cursosSelect.value;
            const datosCurso = data[cursoSelecionado];

            precioVacantes.innerHTML = `
                Código: ${cursoSeleccionado}
                <br>
                Vacantes: ${cursoSeleccionado["numerovac"]}
                <br>
                Precio: ${$cursoSeleccionado["precio"]}
            `;
        });
    });

    function realizarMatricula() { //Funcion para enviar la matricula con el submit y onclick
            var nombre = document.getElementById('nombre').value;
            var cursoSeleccionado = cursosSelect.value;

            fetch('./partials/matriculas.php', {
                body: JSON.stringify({
                    nombre: nombre,
                    curso: cursoSeleccionado
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }
                return response.json();
            })
            .then(data => {
                //console.log(data);
                alert('Matrícula realizada correctamente');
            })
            .catch(error => {
                console.error('Error al realizar la matrícula:', error);
                alert('Error al realizar la matrícula');
            });
        }
</script>

</body>

</html>