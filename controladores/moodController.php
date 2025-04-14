
<?php
session_start();
require_once '../modelos/estadoAnimo.php';

$json = file_get_contents("php://input");
$datos = json_decode($json, true);

//Historial
if (isset($datos['accion']) && $datos['accion'] === "ver_historial") {

    $usuario_id = $_SESSION['usuario_id'] ?? null;

    if (!$usuario_id) {
        echo json_encode(["error" => "Usuario no autenticado"]);
        exit;
    }

    $filtro = $datos['filtro'] ?? "";

    if ($filtro !== "") {
        $resultados = estadoAnimo::historialPorEstado($usuario_id, $filtro);
    } else {
        $resultados = estadoAnimo::historial($usuario_id);
    }


    echo json_encode($resultados);
    exit;
}




if (!$datos || !isset($datos["emocion"]) || !isset($datos["texto"])) {
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

$usuario_id = $_SESSION['usuario_id'] ?? null;
$estado_animo = $datos['emocion'];
$texto_diario = $datos['texto'];

if (!$usuario_id) {
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}
estadoAnimo::guardar($usuario_id, $estado_animo, $texto_diario);
echo json_encode(["mensaje" => "Guardado con éxito"]);




?>