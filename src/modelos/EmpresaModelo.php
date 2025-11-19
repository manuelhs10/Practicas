<?php
class EmpresaModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function guardar($datos) {
        // Calculamos el total de horas antes de insertar
        $datos['total'] = 
            ($datos['lunes'] ?? 0) +
            ($datos['martes'] ?? 0) +
            ($datos['miercoles'] ?? 0) +
            ($datos['jueves'] ?? 0) +
            ($datos['viernes'] ?? 0);

        // Consulta SQL
        $sql = "INSERT INTO empresas_practicas (
                    razon_social, nombre_empresa, cif_nif,
                    resp_nombre, resp_apellido, resp_dni, resp_email,
                    tutor_nombre, tutor_apellido, tutor_dni, tutor_email,
                    direccion, lunes, martes, miercoles, jueves, viernes,
                    total, compensacion
                ) VALUES (
                    :razon_social, :nombre_empresa, :cif_nif,
                    :resp_nombre, :resp_apellido, :resp_dni, :resp_email,
                    :tutor_nombre, :tutor_apellido, :tutor_dni, :tutor_email,
                    :direccion, :lunes, :martes, :miercoles, :jueves, :viernes,
                    :total, :compensacion
                )";

        $stmt = $this->conexion->prepare($sql);

        // Ejecutamos con los datos
        $stmt->execute($datos);
    }
}