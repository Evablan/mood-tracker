<!-- Panel de usuario -->
<?php
session_start(); //Iniciamos sesión para que funcione el archivo

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
$usuario = isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : 'Usuario Desconocido';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>
    <div class="container">
        <div class="card" style="width:18 rem;">
            <div class="card-body">
                <h1 class="bienvenida"> Bienvenido/a <span class="nombre-usuario"><?php echo $usuario; ?></span></h1>
                <label for="select-emocion">¿Cual es tu estado de ánimo?</label>
                <br><br>
                <form id="form-estado-animo">
                    <select name="emocion" id="select-emocion" class="form-select mb-custom">
                        <option value="">Por favor, escoge la emoción que te representa hoy</option>

                        <option value="feliz">Feliz</option>
                        <option value="triste">Triste</option>
                        <option value="ansioso">Ansiosa/o</option>
                        <option value="enfadado">Enfadada/o</option>
                        <option value="cansado">Cansada/o</option>
                        <option value="motivado">Motivada/o</option>
                        <option value="neutral">Neutral</option>
                        <option value="estresado">Estresada/o</option>
                        <option value="esperanzado">Esperanzada/o </option>
                        <option value="frustrado">Frustrada/o </option>
                        <option value="agradecido">Agradecida/o </option>
                    </select>
                    <textarea class="form-control mb-custom" name="texto-diario" , id="texto-diario" , placeholder="Escribe cómo te has sentido hoy...." , rows="4"></textarea>



                    <button type="submit" class="btn btn-respuesta">Guardar respuesta</button>
                    <p class="frase-final d-block mx-auto">"Tus emociones son importantes. Gracias por compartirlas."</p>
            </div>
        </div>
        <script src="../assets/js/emociones.js"></script>
        </form>
</body>


</html>