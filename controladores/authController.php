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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
}
$sql = " SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1";
$stm = $pdo->prepare($sql);
$stm->bindParam(":usuario", $usuario);
$stm->execute();
$usuarioEncontrado = $stm->fetc(PDO::FETCH_ASSOC);

//6. Si encontramos al usuario, debemos comparar la contraseña ingresada con la almacenada en la base de datos



?>