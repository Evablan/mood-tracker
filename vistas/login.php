<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="login-container p-4 shadow-lg rounded">

        <h1 class="text-center">Inicio de Sesión</h1>
        <form action="../controladores/authController.php" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control input-custom " name=" usuario" id="usuario" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control input-custom" name="contrasena" id="contrasena" required>
            </div>


            <button type="submit" class="btn btn-primary button-inicio w-100">Iniciar Sesión</button>

            <div class="text-center mt-3">

                <a href="registration.php" class="text-decoration-none link-custom">¿No tienes cuenta? Regístrate</a>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>