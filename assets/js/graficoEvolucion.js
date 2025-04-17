document.addEventListener("DOMContentLoaded", function () {
    const botonEvolucion = document.getElementById("btn-ver-evolucion");
    if (!botonEvolucion) return;

    botonEvolucion.addEventListener("click", function () {
        console.log("Click en ver evolución");

        const datos = {
            accion: "ver_evolucion"
        };
        fetch("../controladores/moodController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(datos)
        })

            .then(response => response.text())
            .then(text => {
                try {
                    const data = JSON.parse(text); //Convertimos el texto a JSON
                    console.log("Datos recibidos", data);

                    //Seleccionamos el contenedor dónde irá el gráfico
                    const contenedor = document.getElementById("grafico-evolucion-container")
                    if (!contenedor) {
                        console.error("Contenedor de gráfico evolución no encontrado")
                        return;
                    }

                    //Obtener todas las fechas únicas ordenadas
                    const fechasUnicas = [...new Set(data.map(item => item.fecha))].sort();
                    console.log("Fechas únicas:", fechasUnicas);





                } catch (e) {
                    console.error("Error al parsear JSON:", e);
                    console.warn("Texto recibido sin parsear:", text);

                }




            })

    })
})