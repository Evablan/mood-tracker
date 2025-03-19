<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <!--Logo -->
            <a class="navbar-brand" href="" index.php>
                <i class="fa-solid fa-smile"></i> Mood Tracker
            </a>


            <!-- Botón de menú para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Contenido de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!--Menú de navegación alineado a la izquierda -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-custom" href="login.php">
                            <i class="fa-solid fa-key"></i> Inicio de sesión
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-custom" href="registration.php">
                            <i class="fa-solid fa-right-to-bracket"></i>Regístrate
                        </a>
                    </li>
                    <!--Botón para buscar en la barra de navegación -->
                    <li class="nav item"></li>
                    <form class="d-flex ms-3">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>

                </ul>
            </div>
        </div>
    </nav>

</header>

<!--📌 Explicación del código
✅ navbar navbar-expand-lg navbar-dark bg-primary → Crea una barra de navegación grande (lg), con colores oscuros (navbar-dark) y fondo azul (bg-primary).
✅ container → Centra el contenido dentro de la barra.
✅ navbar-brand → Define el logo o nombre de la aplicación.
✅ navbar-toggler → Botón para expandir o contraer el menú en pantallas pequeñas.
✅ collapse navbar-collapse → Hace que el menú se colapse en móviles y se expanda en pantallas grandes.
✅ ms-auto en ul class="navbar-nav ms-auto" → Alinea los enlaces a la derecha.

📌 Explicación de los cambios
✅ ms-auto en ul → Mueve todo el menú a la derecha.
✅ ms-3 en form → Agrega un margen a la izquierda del formulario para separarlo de los enlaces.
✅ d-flex en form → Hace que el input y el botón estén alineados en la misma fila.
✅ me-2 en input → Agrega margen derecho para separar el campo de búsqueda del botón.-->