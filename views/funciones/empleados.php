<?php
require_once(__DIR__ . "/../conexion/conexion.php");

// Obtener todos los colaboradores
$consulta = "SELECT * FROM colaboradores";
$stmt = $pdo->query($consulta);
$empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mostrar datos
foreach($empleados as $empleado){
    echo "ID: " . $empleado['id'] . "<br>";
    echo "Nombre: " . $empleado['nombre'] . "<br>";
    echo "Apellido: " . $empleado['apellido'] . "<br>";
    echo "Cédula: " . $empleado['cedula'] . "<br>";
    echo "Correo: " . $empleado['correo'] . "<br>";
    echo "Teléfono: " . $empleado['telefono'] . "<br>";
    echo "Dirección: " . $empleado['direccion'] . "<br>";
    echo "Departamento: " . $empleado['departamento'] . "<br>";
    echo "Puesto: " . $empleado['puesto'] . "<br>";
    echo "Fecha de ingreso: " . $empleado['fecha_ingreso'] . "<br>";
    echo "Salario: $" . number_format($empleado['salario'], 2) . "<hr>";
}
?>
