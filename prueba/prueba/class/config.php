<?php
header("Content-type: application/json; charset=utf-8");

class ConexionDB {
    private $host = 'localhost';
    private $usuario = 'root';
    private $clave = '';
    private $base_datos = 'prueba';
    public $conexion;

    public function __construct() {
        $this->conectar();
    }

    private function conectar() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->base_datos);

        if ($this->conexion->connect_error) {
            echo json_encode(['error' => true, 'mensaje' => 'Error de conexión: ' . $this->conexion->connect_error]);
            exit;
        }

        $this->conexion->set_charset("utf8");
    }

    public function cerrar() {
        $this->conexion->close();
    }
}

// Uso de la clase
$db = new ConexionDB();
$conexion = $db->conexion; 


