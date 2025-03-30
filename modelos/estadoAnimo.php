<!-- Interacción con la base de datos -->

<!--1. Conexión a la bbdd -->
<?php
require_once __DIR__ . '/../config/dataBase.php';

/*2. Definir una clase estadoAnimo() que será la responsable de la lógica de guardado*/

class estadoAnimo
{
    public static function guardar($usuario_id, $estado_animo, $texto_diario)
    {
        global $pdo; //Usamos la conexión $pdo desde dataBase.php  
        $sql = "INSERT INTO tabla estados_animo(usuario_id, estado_animo, texto_diario,fecha) VALUES (?,?,?NOW())";
        $stm = $pdo->prepare($sql);
        $stm->execute([$usuario_id, $estado_animo, $texto_diario]);
    }
}







?>