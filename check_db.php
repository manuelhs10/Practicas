<?php
require_once __DIR__ . '/config/db.php';

echo "<h3>Rama Git actual: $branch</h3>";
echo "<h4>Base de datos conectada: $base_datos</h4>";

try {
    $stmt = $conexion->query("SHOW TABLES LIKE 'empresas_practicas'");
    if ($stmt->rowCount() > 0) {
        echo "✅ La tabla <strong>empresas_practicas</strong> existe y la conexión funciona correctamente.";
    } else {
        echo "⚠️ No se encontró la tabla <strong>empresas_practicas</strong> en la base $base_datos.";
    }
} catch (PDOException $e) {
    echo "❌ Error al consultar la base de datos: " . $e->getMessage();
}
