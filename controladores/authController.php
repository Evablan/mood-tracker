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
    require_once '../config/dataBase.php';

    //REGISTRO
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['registro'])) {
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];

        $passwordhash = password_hash($contrasena, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO usuarios(nombre, email, password_hash) VALUES (:usuario, :email, :password)";
            $stm = $pdo->prepare($sql);
            $stm->bindParam(":usuario", $usuario);
            $stm->bindParam(":email", $email);
            $stm->bindParam(":password", $passwordhash);
            $stm->execute();

            header("Location: ../vistas/login.php?success=1");
            exit();
        } catch (PDOException $e) {
            echo "Error al registrar: " . $e->getMessage();
        }
    }

    //LOGIN (¡Separado del registro!)
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT * FROM usuarios WHERE nombre = :usuario LIMIT 1";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(":usuario", $usuario);
        $stm->execute();
        $usuarioEncontrado = $stm->fetch(PDO::FETCH_ASSOC);

        if ($usuarioEncontrado && password_verify($contrasena, $usuarioEncontrado["password_hash"])) {
            $_SESSION["usuario_id"] = $usuarioEncontrado["id"];
            $_SESSION["usuario"] = $usuarioEncontrado["nombre"];

            header("Location: ../vistas/dashboard.php");
            exit();
        } else {
            header("Location: ../vistas/login.php?error=1");
            exit();
        }
    }
    ?>