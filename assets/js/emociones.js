
/*Envuelvo mi bloque en el DOM, ya que cuando se carga el script el DOM aun no está cargado asi que en ese momento
el select-emocion no existe para el por eso lo envolvemos en esta estrucutra*/

const emocionesColores = {
    feliz: "#FFE066",
    triste: "#A3C4F3",
    ansioso: "#B5B5B5",
    enfadado: "#FF6B6B",
    cansado: "#D3D3D3",
    motivado: "#90EE90",
    neutral: "#F0F0F0",
    estresado: "#FFB347",
    esperanzado: "#AED581",
    frustrado: "#F28B82",
    agradecido: "#FFF176"
};
/*✅ Esto es como un diccionario: la clave es la emoción y el valor es el color.*/


document.addEventListener("DOMContentLoaded", function () {
    const selectEmocion = document.getElementById("select-emocion");
    //Si no lo encuentra, salimos
    if (!selectEmocion) return;

    //Cuando el usuario cambia la emoción
    selectEmocion.addEventListener("change", function () {
        const emocionSeleccionada = selectEmocion.value;
        const color = emocionesColores[emocionSeleccionada];

        //Buscamos si esa emoción tiene un color asignado

        if (color) {
            //Si existe el color se lo aplicamos al fondo del select
            selectEmocion.style.backgroundColor = color;
            selectEmocion.style.color = "#000"; // para que siempre se lea bien
        } else {
            selectEmocion.style.backgroundColor = "#fff";
            selectEmocion.style.color = "#000";
        }
    });

});

//Capturar datos del formulario y preparar el FECTH() 
const formulario = document.getElementById("form-estado-animo");
formulario.addEventListener("submit", function (event) { //Ese event es un objeto automático que representa el evento que ocurrió (en este caso, el envío del formulario).
    event.preventDefault(); //Impide el comportamiento por defecto del form que es recargar la pag, le está diciendo "Espera!dejamelo a mi que lo voy a enviar por JS"

    //Aquí va el resto de la lógica con AJAX
    const emocion = document.getElementById("select-emocion").value


});





