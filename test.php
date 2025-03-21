<?php
//Aquí haremos pruebas 
require_once 'config/database.php';

if ($pdo) {
    echo "Conexión exitosa a la base de datos";
} else {
    echo "Error de conexión a la base de datos";
}
