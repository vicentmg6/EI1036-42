async function cargaFech(src_url, lugar) {
    try {
       let response = await fetch(src_url)
       if (response.status !== 200) {
          console.log('We have a problem. Status Code: ' +
             response.status);
          throw new Error(response.status)
       }
       data = await response.json();
       p = document.createElement("p");
       p.innerHTML = JSON.stringify(data);
       lugar.appendChild(p);
       return true
    }
    catch (err) {
       console.log('Fetch Error :' + err);
       return false;
    };

 }
 async function cargaFechImage(src_url, lugar) {
    try {
       let response = await fetch(src_url)
       if (response.status !== 200) {
          console.log('We have a problem. Status Code: ' +
             response.status);
          throw new Error(response.status)
       }
       data = await response.blob();
       var objectURL = URL.createObjectURL(data);
       lugar.src = objectURL;
       return (true)
    }
    catch (err) {
       console.log('Fetch Error :-S', err);
       return (false)
    };

 }

 function detectores() {
    lugar = document.querySelector("#divi");
    enlace = document.querySelector("#txt");
    enlace.addEventListener("click", function (event) {
       event.preventDefault()
       if (cargaFech(event.target.href, lugar) == true) {
          console.log("CorrectoT!!")
       }
    });
    document.querySelector("#img").addEventListener("click", function (event) {
       event.preventDefault()
       if (cargaFechImage(event.target.href, lugar.querySelector("img")) == true) {
          console.log("CorrectoI!!!")
       }
    });
 }
 document.addEventListener("DOMContentLoaded", function () {
    detectores()
 });