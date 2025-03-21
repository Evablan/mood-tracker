<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="login-container p-4 shadow-lg rounded">

        <h1 class="text-center">Registro de usuarios</h1>
        <form action="../controladores/authController.php" method="POST">
            <input type="hidden" name="registro" value="1">

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control input-custom " name=" usuario" id="usuario" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control input-custom " name=" email" id="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control input-custom" name="contrasena" id="contrasena" required>
            </div>


            <button type="submit" class="btn btn-primary button-inicio w-100">Regístrate</button>



        </form>
    </div>

</body>

</html>