<?php
ob_start();
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
//Gráficos
if (isset($datos['accion']) && $datos['accion'] === "ver_grafico") {
    $usuario_id = $_SESSION['usuario_id'] ?? null;
    if (!$usuario_id) {
        echo json_encode(["error" => "Usuario no autenticado"]);
        exit;
    }
    $grafico = $datos['grafico'] ?? "";
    $resultados = estadoAnimo::graficos($usuario_id);
    echo json_encode($resultados);
    exit;
}
//Acción guardar
if (isset($datos['accion']) && $datos['accion'] === "guardar") {
    if (!$datos || !isset($datos["emocion"]) || !isset($datos["texto"])) {
        echo json_encode(["error" => "Faltan datos"]);
        exit;
    }
    $usuario_id = $_SESSION['usuario_id'] ?? null;
    $estado_animo = $datos['emocion'];
    $texto_diario = $datos['texto'];

    if (trim($estado_animo) === "" || trim($texto_diario) === "") {
        echo json_encode(["error" => "Los campos no pueden estar vacíos"]);
        exit;
    }
    if (!$usuario_id) {
        echo json_encode(["error" => "Usuario no autenticado"]);
        exit;
    }
    estadoAnimo::guardar($usuario_id, $estado_animo, $texto_diario);
    echo json_encode(["mensaje" => "Guardado con éxito"]);
    exit;

    //Acción evolución

    if (isset($datos['accion']) && $datos['accion'] === "ver_evolucion") {
        $usuario_id = $_SESSION['usuario_id'] ?? null;
        if (!$usuario_id) {
            echo json_encode(["error" => "Usuario no autenticado"]);
            exit;
        }


        $resultados = estadoAnimo::evolucion($usuario_id);
        echo json_encode($resultados);
        exit;
    }
}
