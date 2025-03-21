<!-- Manejo de autenticación -->
<!-- Paso1: Crear el archivo authController.php
 paso2: Iniciar la sesión, como vamos a trabajar con sesiones ,
 para mantener la autenticación del usuario, lo primero
 que debes hacer es iniciar sesión.
 paso3:Conectar con la base de datos
 paso 4: Verificar si se ha enviado el formulario
 paso 5:Buscar al usuario en la base de datos-
 paso 6:Verificar la contraseña->

<?php
session_start();

/*3.Conexión a la base de datos */
require_once '../config/dataBase.php';

/*4. Verificamos si se envió el formulario */
//1.Recoger los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['registro'])) {
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    //Hash de la contraseña ANTES de guardarla en la base de datos
    $passwordhash = password_hash($contrasena, PASSWORD_DEFAULT);
    try {

        $sql = "INSERT INTO usuarios(nombre, email, password_hash) VALUES (:usuario, :email, :password)";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(":usuario", $usuario);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":password", $passwordhash);
        $stm->execute();

        header("Location:../vistas/login.php?success=1");
        exit();
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }

    //Inicio de sesión, verificar la contraseña
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        require_once '../config/dataBase.php';
        session_start();

        $usuario = $_POST["usuario"];
        $contrasena = $post["contrasena"];

        $sql = " SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(":usuario", $usuario);
        $stm->execute();
        $usuarioEncontrado = $stm->fetch(PDO::FETCH_ASSOC);

        //6. Si encontramos al usuario, debemos comparar la contraseña ingresada con la almacenada en la base de datos
        if ($usuarioEncontrado && password_verify($contrasena, $usuarioEncontrado["password_harsh"])) {
            //Guardar datos en sesión
            $_SESSION["usuario_id"] = $usuarioEncontrado["id"];
            $_SESSION["usuario"] = $usuarioEncontrado["nombre"];

            //Redirigir al dashboard
            header("Location: ../vistas/dashboard.php");
            exit();
        } else {
            //Si las credenciales son incorrectas, redirigir con un mensaje de error
            header("Location:../vistas/login.php?error=1");
            exit();
        }
    }
}
?>