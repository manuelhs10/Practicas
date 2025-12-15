<?php
class AltaModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function guardar($datos) {
        $sql = "INSERT INTO alta_practicas (emp_nombre, ciclo, emp_email, curso_escolar)
        VALUES (:emp_nombre, :ciclo, :emp_email, :curso_escolar)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($datos);
    }

}

