<?php
include '../class/classActividad.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $actividad = new Actividad();
    $actividad->getActividad($_GET['id']);
} else {
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'ID inválido']);
}