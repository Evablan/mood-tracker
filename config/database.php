
<?php
//Creación de la conexión a la base de datos
$host = 'localhost'; //Servidor de la base de datos
$dbname = 'mood-tracker';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión" . $e->getMessage());
}


?>