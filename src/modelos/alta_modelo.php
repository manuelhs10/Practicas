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

}

