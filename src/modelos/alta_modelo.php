<?php
class AltaModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Guardar un registro
    public function guardar($datos) {
        $sql = "INSERT INTO alta_practicas (
                    emp_nombre, ciclo, emp_email
                ) VALUES (
                    :emp_nombre, :ciclo, :emp_email
                )";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($datos);
    }

    // Obtener todos los registros
    public function obtenerEmpresas() {
        $sql = "SELECT * FROM alta_practicas ORDER BY id DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

