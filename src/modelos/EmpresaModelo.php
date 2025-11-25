<?php
class EmpresaModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Guardar datos de la empresa
    public function guardar($datos) {
        // Calculamos el total
        $datos['total'] = 
            ($datos['lunes'] ?? 0) +
            ($datos['martes'] ?? 0) +
            ($datos['miercoles'] ?? 0) +
            ($datos['jueves'] ?? 0) +
            ($datos['viernes'] ?? 0);

        // Si NO recibe compensación → la cantidad debe ser NULL
        if ($datos['compensacion'] === 'no') {
            $datos['cantidad_mensual'] = NULL;
        }

        $sql = "INSERT INTO empresas_practicas (
                    razon_social, nombre_empresa, cif_nif,
                    resp_nombre, resp_apellido, resp_dni, resp_email,
                    tutor_nombre, tutor_apellido, tutor_dni, tutor_email,
                    direccion, lunes, martes, miercoles, jueves, viernes,
                    total, compensacion, cantidad_mensual
                ) VALUES (
                    :razon_social, :nombre_empresa, :cif_nif,
                    :resp_nombre, :resp_apellido, :resp_dni, :resp_email,
                    :tutor_nombre, :tutor_apellido, :tutor_dni, :tutor_email,
                    :direccion, :lunes, :martes, :miercoles, :jueves, :viernes,
                    :total, :compensacion, :cantidad_mensual
                )";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($datos);
    }

    // Obtener todos los registros
    public function obtenerEmpresas() {
        $sql = "SELECT * FROM empresas_practicas ORDER BY id DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

