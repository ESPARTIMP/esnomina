<?php
require_once 'conexion.php';

// Ahora $pdo ya está disponible desde conexion.php
try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM empleados");
    $count = $stmt->fetchColumn();
    echo "Conexión OK. Número de empleados: $count";
} catch (PDOException $e) {
    echo "Error al consultar: " . $e->getMessage();
}
?>
