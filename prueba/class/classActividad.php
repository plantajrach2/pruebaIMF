<?php
header("Content-type: application/json; charset=utf-8");
include 'config.php';

class Actividad extends ConexionDB {

    public function loadActividades() {

        $statement=$this->conexion->prepare("SELECT * FROM actividades");
        $statement->execute();
        $resultados=$statement->get_result();
        
        // var_dump($resultados->fetch);
        
        $respuesta =[];
        
        while ($fila=$resultados->fetch_assoc()) {
            # code...
            $usuario=[
                'id_actividad'  =>  $fila['id_actividad'],
                'nombre'        =>  $fila['nombre'],
                'descripcion'   =>  $fila['descripcion'],
                'fecha_apertura'=>  $fila['fecha_apertura'],
                'fecha_cierre'=>  $fila['fecha_cierre'],
                'hecha'=>  $fila['hecha'] 
            ];
        
            array_push($respuesta,$usuario);
        }
        
        echo json_encode($respuesta);
    }

    public function setActividades(){

        $hecha = ($_POST['hecha'] === "true") ? 1 : 0;

        $statement = $this->conexion->prepare("INSERT INTO actividades (nombre, descripcion, fecha_apertura, fecha_cierre,hecha) VALUES (?,?,?,?,?)");
        $statement->bind_param("ssssi", $_POST['nombre'],$_POST['descripcion'],$_POST['fecha_apertura'],$_POST['fecha_cierre'],$hecha);
        $respuesta=$statement->execute();
        
        if ($this->conexion->affected_rows<=0 || $_POST['fecha_apertura'] > $_POST['fecha_cierre']) {
            # code...
            $respuesta =['error'=>'no se pudo agregar ninguna fila'];
        }
        echo json_encode($respuesta);
    }

    public function getActividad($id) {
        
        $respuesta = [];

        // Prepara consulta segura
        $statement = $this->conexion->prepare("SELECT * FROM actividades WHERE id_actividad = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        $resultados = $statement->get_result();

        while ($fila = $resultados->fetch_assoc()) {
            $usuario = [
                'id_actividad'  =>  $fila['id_actividad'],
                'nombre'        =>  $fila['nombre'],
                'descripcion'   =>  $fila['descripcion'],
                'fecha_apertura'   =>  $fila['fecha_apertura'],
                'fecha_cierre'   =>  $fila['fecha_cierre'],
                'hecha'=>  $fila['hecha'] 
            ];

            $respuesta[] = $usuario;
        }

        if (count($respuesta) === 0) {
            http_response_code(404);
        } else {
            http_response_code(200);
        }

        echo json_encode($respuesta);
    }

    public function updateActividad(){

        $statement = $this->conexion->prepare("UPDATE `actividades` SET `nombre` = ?, `descripcion` = ?,`fecha_apertura` = ?,`fecha_cierre` = ?,'hecha'=? WHERE `id_actividad` = ?");
        $statement->bind_param("ssssii", $_POST['nombre'],$_POST['descripcion'],$_POST['fecha_apertura'],$_POST['fecha_cierre'],$_POST['hecha'],$_POST['id_actividad']);
       $respuesta=$statement->execute();
        
        if ($this->conexion->affected_rows<=0) {
            # code...
            $respuesta =['error'=>'no se pudo agregar ninguna fila'];
        }
        echo json_encode($respuesta);

    }

    public function markAsDone(){

        $hecha = ($_POST['hecha'] === "true") ? 1 : 0;

        $statement = $this->conexion->prepare("UPDATE `actividades` SET `hecha`=? WHERE `id_actividad` = ?");
        
        $statement->bind_param("ii",$hecha,$_POST['id_actividad']);
        $respuesta=$statement->execute();
        
        if ($this->conexion->affected_rows<=0) {
            # code...
            $respuesta =['error'=>'no se pudo agregar ninguna fila'];
        }
        echo json_encode($respuesta);

    }

    public function selectActividad() {
        $stmt = $this->conexion->prepare("SELECT id_actividad, nombre FROM `actividades`");
        $stmt->execute();
        $result = $stmt->get_result();

        $puestos = [];

        while ($fila = $result->fetch_assoc()) {
            $puestos[] = [
                'id' => $fila['id_actividad'],
                'nombre' => $fila['nombre']
            ];
        }

        echo json_encode($puestos);
    }

}