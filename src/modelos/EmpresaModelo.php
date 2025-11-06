<?php
class EmpresaModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function guardar($datos) {
        $sql = "INSERT INTO empresas_practicas (
                    razon_social, nombre_empresa, cif_nif,
                    resp_nombre, resp_apellido, resp_dni, resp_email,
                    tutor_nombre, tutor_apellido, tutor_dni, tutor_email,
                    direccion, horario, compensacion
                ) VALUES (
                    :razon_social, :nombre_empresa, :cif_nif,
                    :resp_nombre, :resp_apellido, :resp_dni, :resp_email,
                    :tutor_nombre, :tutor_apellido, :tutor_dni, :tutor_email,
                    :direccion, :horario, :compensacion
                )";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($datos);
    }
}
?>
