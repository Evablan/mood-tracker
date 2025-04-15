document.addEventListener("DOMContentLoaded", function () {
    const botonGrafico = document.getElementById("btn-ver-grafico");
    if (!botonGrafico) return;

    botonGrafico.addEventListener("click", function () {

        const datos = {
            accion: "ver_grafico"
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
                    const data = JSON.parse(text); // Convertimos el texto en JSON
                    console.log("Datos recibidos:", data);
                    // Seleccionamos el contenedor donde irá el gráfico
                    const contenedor = document.getElementById("grafico-container");
                    if (!contenedor) {
                        console.error("Contenedor de gráfico no encontrado");
                        return;
                    }
                    // Extraemos etiquetas y valores del JSON
                    const labels = data.map(item => item.estado_animo);
                    const valores = data.map(item => item.total);

                    // Si ya hay un gráfico, lo destruimos
                    if (window.graficoInstancia) {
                        window.graficoInstancia.destroy();
                    }
                    // Creamos el nuevo gráfico con Chart.js
                    const ctx = document.getElementById("grafico-emociones").getContext("2d");

                    window.graficoInstancia = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Frecuencia de emociones",
                                data: valores,
                                backgroundColor: "rgba(75, 192, 192, 0.5)",
                                borderColor: "rgba(75, 192, 192, 1)",
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                } catch (e) {
                    console.error("Error al parsear JSON:", e);
                    console.warn("Texto recibido sin parsear:", text); {

                    }
                }

            })


    })
})