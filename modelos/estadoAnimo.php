
<?php
require_once __DIR__ . '/../config/dataBase.php';
class estadoAnimo
{
    public static function guardar($usuario_id, $estado_animo, $texto_diario)
    {
        global $pdo;
        $sql = "INSERT INTO  estados_animo(usuario_id, estado_animo, texto_diario,fecha) VALUES (?, ?, ?, NOW())";
        $stm = $pdo->prepare($sql);
        $stm->execute([$usuario_id, $estado_animo, $texto_diario]);
    }

    public static function historial($usuario_id)
    {
        global $pdo;
        $sql = "SELECT * FROM estados_animo WHERE usuario_id = ? ORDER BY fecha DESC";
        $stm = $pdo->prepare($sql);
        $stm->execute([$usuario_id]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function historialPorEstado($usuario_id, $estado_animo)
    {
        global $pdo;
        $sql = "SELECT * FROM estados_animo
         WHERE usuario_id = ? and estado_animo = ? 
         ORDER BY fecha DESC";
        $stm = $pdo->prepare($sql);
        $stm->execute([$usuario_id, $estado_animo]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function graficos($usuario_id)
    {
        global $pdo;
        $sql = "SELECT estados_animo, COUNT(*) as total 
        FROM estados_animo
        WHERE usuario_id = ?
        GROUP BY estado_animo";
        $stm = $pdo->prepare($sql);
        $stm->execute([$usuario_id]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}







?>