/*✔ Efecto:
Cuando el usuario haga scroll, la barra de navegación se vuelve 
ligeramente opaca con sombra.Esto mejora la experiencia de usuario
 y lo hace ver más profesional.*/
window.addEventListener("scroll", function () {
    let navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});
