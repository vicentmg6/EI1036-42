<aside id="tiempo">
    <br>
</aside>
<script type="text/javascript">
    async function cargaFech(src_url, lugar) {
        try {
            let response = await fetch(src_url)
            if (response.status !== 200) {
                console.log('We have a problem. Status Code: ' + response.status);
                throw new Error(response.status)
            }
            let data = await response.json();

            let nombre = data.title;
            let fecha = data.fecha;
            let tiempo = data.stateSky;
            tiempo = tiempo["description"];
            let tempAct = data.temperatura_actual;
            let temperaturasaxmin = data.temperaturas;
            let tempMax = temperaturasaxmin["max"];
            let tempMin = temperaturasaxmin["min"];

            let elemTitle = document.createElement("h2");
            elemTitle.textContent = `${nombre}`;
            let elemFecha = document.createElement("p");
            elemFecha.textContent = `Fecha: ${fecha} `;
            let elemTiempo = document.createElement("p");
            elemTiempo.textContent = `Cielo: ${tiempo}`;
            let elemTempAct = document.createElement("p");
            elemTempAct.textContent = `Temperatura Actual: ${tempAct} `;
            let elemTempMax = document.createElement("p");
            elemTempMax.textContent = `Temperatura Máxima: ${tempMax}`;
            let elemTempMin = document.createElement("p");
            elemTempMin.textContent = `Temperatura Mínima: ${tempMin} `;

            lugar.appendChild(elemTitle);
            lugar.appendChild(elemFecha);
            lugar.appendChild(elemTiempo);
            lugar.appendChild(elemTempAct);
            lugar.appendChild(elemTempMax);
            lugar.appendChild(elemTempMin);


            return true;

        } catch (err) {
            console.log('Fetch Error :' + err);
            return false;
        }

    }

    function detectores() {
        let lugar = document.querySelector("#tiempo");
        let enlace = "https://www.el-tiempo.net/api/json/v2/provincias/45/municipios/45132";
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