
document.addEventListener("DOMContentLoaded", function () {

    const botonHistorial = document.getElementById("btn-ver-historial");
    if (!botonHistorial) return;

    botonHistorial.addEventListener("click", function () {
        const emocionFiltrada = document.getElementById("filtro-emocion").value;
        console.log("Click en ver historial");

        //Creamos una variable que guarde los datos del historial

        const datos = {
            accion: "ver_historial",
            filtro: emocionFiltrada
        };
        fetch("../controladores/moodController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(datos)
        })
            .then(response => response.json())
            .then(data => {
                console.log("Historial recibido:", data);
                const contenedor = document.getElementById("historial-container");
                contenedor.innerHTML = "";

                if (data.length === 0) {
                    contenedor.innerHTML = "<p>No hay registros aún</p>";
                    return;
                }

                //Crear lista de registros
                const lista = document.createElement("ul");
                data.forEach(item => {
                    // Creamos la tarjeta
                    const tarjeta = document.createElement("div");
                    tarjeta.classList.add("tarjeta-emocion", `emocion-${item.estado_animo}`);

                    // Encabezado (emoción y fecha)
                    const encabezado = document.createElement("div");
                    encabezado.classList.add("tarjeta-encabezado");
                    encabezado.textContent = `${item.estado_animo.toUpperCase()} - ${item.fecha}`;

                    // Cuerpo (texto diario)
                    const cuerpo = document.createElement("div");
                    cuerpo.classList.add("tarjeta-texto");
                    cuerpo.textContent = item.texto_diario;

                    // Añadir al DOM
                    tarjeta.appendChild(encabezado);
                    tarjeta.appendChild(cuerpo);
                    contenedor.appendChild(tarjeta)
                });

                contenedor.appendChild(lista);

            })
            .catch(error => {
                console.error("Error al obtener historial", error)
            });
    });
});