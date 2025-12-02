<?php
class EmpresaModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Guardar datos de la empresa
    public function guardar($datos) {
        // Calculamos el total de horas
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
                    total, compensacion, cantidad_mensual,
                    ciclo, inicio_curso, fin_curso
                ) VALUES (
                    :razon_social, :nombre_empresa, :cif_nif,
                    :resp_nombre, :resp_apellido, :resp_dni, :resp_email,
                    :tutor_nombre, :tutor_apellido, :tutor_dni, :tutor_email,
                    :direccion, :lunes, :martes, :miercoles, :jueves, :viernes,
                    :total, :compensacion, :cantidad_mensual,
                    :ciclo, :inicio_curso, :fin_curso
                )";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($datos);
    }

    // Obtener empresa año actual
    public function obtenerEmpresas() {
        $hoy = date('Y-m-d');
        $anio = date('Y');
        $mes = date('m');

        if ($mes >= 9) { // Septiembre o mas
            $inicio_curso_actual = "$anio-09-01";
            $fin_curso_actual = ($anio + 1) . "-08-31";
        } else { // Antes de septiembre
            $inicio_curso_actual = ($anio - 1) . "-09-01";
            $fin_curso_actual = "$anio-08-31";
        }

        $sql = "SELECT * FROM empresas_practicas
                WHERE inicio_curso <= :fin_curso
                AND fin_curso >= :inicio_curso
                ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            'inicio_curso' => $inicio_curso_actual,
            'fin_curso' => $fin_curso_actual
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener histórico completo
    public function obtenerEmpresasHistorico() {
        $sql = "SELECT * FROM empresas_practicas ORDER BY id DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar registro
    public function eliminar($id) {
        $sql = "DELETE FROM empresas_practicas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Obtener un registro por ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM empresas_practicas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar registro
    public function actualizar($datos) {
        $sql = "UPDATE empresas_practicas SET 
                    razon_social = :razon_social,
                    nombre_empresa = :nombre_empresa,
                    cif_nif = :cif_nif,
                    resp_nombre = :resp_nombre,
                    resp_apellido = :resp_apellido,
                    resp_email = :resp_email,
                    tutor_nombre = :tutor_nombre,
                    tutor_apellido = :tutor_apellido,
                    tutor_email = :tutor_email,
                    direccion = :direccion,
                    ciclo = :ciclo,
                    inicio_curso = :inicio_curso,
                    fin_curso = :fin_curso
                WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($datos);
    }
}
?>
