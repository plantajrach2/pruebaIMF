<?php

header("Content-type: application/json; charset=utf-8");
include 'config.php';

class Usuario extends ConexionDB {

    public function selectUsuario() {
        $stmt = $this->conexion->prepare("SELECT id,nombre,apprimero,apsegundo FROM `personal`");
        $stmt->execute();
        $result = $stmt->get_result();

        $puestos = [];

        while ($fila = $result->fetch_assoc()) {
            $puestos[] = [
                'id' => $fila['id'],
                'nombre' => $fila['nombre'].' '.$fila['apprimero'].' '.$fila['apsegundo']
            ];
        }

        echo json_encode($puestos);
    }

}