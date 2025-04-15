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
            .then(response => response.json())
            .then(data => {
                console.log("Datos recibidos", data);
                const contenedor = document.getElementById("grafico-container");
            })

    })


})