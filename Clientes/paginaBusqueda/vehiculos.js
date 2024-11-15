let filtros = document.querySelectorAll(".filtros input[type=radio]");
let seleccionar = document.querySelectorAll(".seleccionar");
let vehiculosDiv = document.querySelector(".vehiculos .row");

const mostrarVehiculos = function (datos) {

    if (datos != 'error') {

        datos.forEach(dato => {
            //Creando la Columna y el Card
            let columna = document.createElement("div");
            columna.classList.add("column", "col-12", "col-lg-6", "col-xl-4");
            let card = document.createElement("div");
            card.classList.add("card");
            let info = document.createElement("div");
            info.classList.add("card-body", "row");

            //Imagen del auto
            let imagen = document.createElement("img");
            imagen.classList.add("card-img-top", "w-100");
            imagen.src = dato.imagen_url;
            imagen.alt = "Foto del " + dato.id_marca + " " + dato.id_modelo;

            //Marca y Modelo
            let titulo = document.createElement("div");
            titulo.classList.add("card-title", "text-center", "mt-3", "fw-medium");
            titulo.innerHTML = dato.id_marca + " " + dato.id_modelo;
            //Color
            let color = document.createElement("div");
            color.innerHTML = "<b>Color</b><br>" + dato.color;
            color.classList.add("card-subtitle", "col-6", "text-center", "text-body-secondary");
            //Combustible
            let combustible = document.createElement("div");
            combustible.innerHTML = "<b>Combustible</b><br>" + dato.combustible;
            combustible.classList.add("card-subtitle", "col-6", "text-center", "text-body-secondary");
            //Plazas
            let plazas = document.createElement("div");
            plazas.innerHTML = "<b>Plazas</b><br>" + dato.plazas;
            plazas.classList.add("card-subtitle", "col-6", "text-center", "text-body-secondary");
            //Transmision
            let transmision = document.createElement("div");
            transmision.innerHTML = "<b>Transmisión</b><br>" + dato.transmision;
            transmision.classList.add("card-subtitle", "col-6", "text-center", "text-body-secondary");
            //Maletas
            let maletas = document.createElement("div");
            maletas.innerHTML = "<b>Maletas</b><br>" + dato.cantidad_maletas;
            maletas.classList.add("card-subtitle", "col-6", "text-center", "text-body-secondary");
            //Aire Acondicionado
            let aire = document.createElement("div");
            aire.innerHTML = "<b>A/C</b><br>" + dato.aire_acondicionado;
            aire.classList.add("card-subtitle", "col-6", "text-center", "text-body-secondary");

            //Boton para seleccionar el auto
            let link = document.createElement("a");
            link.innerHTML = "Selecionar";
            link.setAttribute("href", "#");
            link.classList.add("btn", "seleccionar");
            //Almacenar el ID en cada boton
            link.setAttribute("id", dato.id_unidad);

            //Agregar el auto
            info.appendChild(color);
            info.appendChild(combustible);
            info.appendChild(plazas);
            info.appendChild(transmision);
            info.appendChild(maletas);
            info.appendChild(aire);
            card.appendChild(imagen);
            card.appendChild(titulo);
            card.appendChild(info);
            card.appendChild(link);
            columna.appendChild(card);
            vehiculosDiv.appendChild(columna);
        });
    } else {
        let h1 = document.createElement("h1");
        h1.innerHTML = "Lo sentimos, no se encontraron vehículos con esas características.";
        h1.classList.add("display-4");
        vehiculosDiv.appendChild(h1);
    }
};

const cargarVehiculos = async function () {
    let url = "cargarVehiculos.php";

    try {
        let response = await fetch(url);

        const datos = await response.json();

        mostrarVehiculos(datos);
    } catch (error) {
        let h1 = document.createElement("h1");
        h1.innerHTML = "Lo sentimos, hubo un error al cargar los vehículos.";
        h1.classList.add("display-4");
        vehiculosDiv.appendChild(h1);
    }
};

filtros.forEach(function (checkbox) {
    checkbox.addEventListener('change', async function () {
        vehiculosDiv.innerHTML = "";
        if (this.checked) {
            let url = "filtrarVehiculos.php";
            try {
                let response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        filtro: this.name,
                        valor: this.id,
                    })
                });

                const datos = await response.json();
                mostrarVehiculos(datos);
            } catch (error) {
                let h1 = document.createElement("h1");
                h1.innerHTML = "Lo sentimos, hubo un error al cargar los vehículos.";
                h1.classList.add("display-4");
                vehiculosDiv.appendChild(h1);
            }
        }
    });
});

const elegirVehiculo = function () {
    seleccionar.forEach(function (boton) {
        boton.addEventListener("click", async function () {
            let id = this.id;
            let url = "guardarSeleccion.php";

            try {
                let response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        id_unidad: id
                    })
                });

                const datos = await response.text();

                console.log(datos);

                // if(datos === "success"){
                //     location.href = "../pagarReserva/pago.php";
                // } else {
                //     console.log(error);
                // }

            } catch (error) {
                console.log(error);
            }
        });
    });
}



addEventListener("DOMContentLoaded", elegirVehiculo());
addEventListener("DOMContentLoaded", cargarVehiculos());