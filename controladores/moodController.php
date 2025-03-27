
<?php
session_start(); //Iniciamos la sesión para que se guarden los datos del ususario conectado

//1.Recogemos el JSON del body
$json = file_get_contents("php://input");

//2.Lo convertimos en un array asociativo
$datos = json_decode($json, true);
echo json_encode($datos);  //3. Ver que contiene





?>