<?php
include '../class/classActividad.php';

if (isset($_POST)) {
    $actividad = new Actividad();
    $actividad->updateActividad();
}else{
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'ID inválido']);
}