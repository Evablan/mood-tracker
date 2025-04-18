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
                console.log("Texto recibido:", text);
                try {
                    const data = JSON.parse(text); //Convertimos el texto a JSON
                    console.log("Datos recibidos", data);

                    //Seleccionamos el contenedor dónde irá el gráfico
                    const contenedor = document.getElementById("grafico-evolucion-container")
                    if (!contenedor) {
                        console.error("Contenedor de gráfico evolución no encontrado")
                        return;
                    }

                    //Obtener fechas únicas y emociones únicas ordenadas
                    const fechasUnicas = [...new Set(data.map(item => item.fecha))].sort();
                    const emocionesUnicas = [...new Set(data.map(item => item.estado_animo))].sort();

                    console.log("Fechas únicas:", fechasUnicas);
                    console.log("Emociones únicas", emocionesUnicas);

                    //Crear el mapa base vacío con ceros y Recorremos cada emoción y fecha
                    const mapaBase = {};
                    emocionesUnicas.forEach(emocion => {
                        mapaBase[emocion] = {};
                        fechasUnicas.forEach(fecha => {
                            mapaBase[emocion][fecha] = 0;
                        });
                    });

                    //Paso 3: Rellenar el mapa con los datos reales
                    data.forEach(item => {
                        const { estado_animo, fecha, total } = item;
                        if (mapaBase[estado_animo] && mapaBase[estado_animo][fecha] !== undefined) {
                            mapaBase[estado_animo][fecha] = total;
                        }
                    });

                    //Crear los datasets para chart.js
                    const datasets = emocionesUnicas.map((emocion, index) => {
                        return {
                            label: emocion,
                            data: fechasUnicas.map(fecha => mapaBase[emocion][fecha]),
                            fill: false,
                            borderColor: `hsl(${index * 50}, 70%, 50%)`,
                            tension: 0.3,


                        };
                        console.log("Datasets generados:", datasets);
                        console.log("Fechas únicas:", fechasUnicas);
                        console.log("Mapa base:", mapaBase);



                    });

                    // Si ya existe un gráfico anterior, lo destruimos
                    if (window.graficoEvolucion) {
                        window.graficoEvolucion.destroy();
                    }

                    // Crear el gráfico de líneas
                    const ctx = document.getElementById("grafico-evolucion-tiempo").getContext("2d");
                    window.graficoEvolucion = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: fechasUnicas,
                            datasets: datasets
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Frecuencia'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Fecha'
                                    }
                                }
                            }
                        }
                    });


                } catch (e) {
                    console.error("Error al parsear JSON:", e);
                    console.warn("Texto recibido sin parsear:", text);

                }




            })
    })
})
