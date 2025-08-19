<?php
require_once(__DIR__ . "/../conexion/conexion.php");

try {
    // Tabla empleados
    $sql1 = "
    IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'empleados')
    BEGIN
        CREATE TABLE empleados (
            id INT IDENTITY(1,1) PRIMARY KEY,
            nombre NVARCHAR(100),
            apellido NVARCHAR(100),
            correo NVARCHAR(100)
        )
    END
    ";
    $pdo->exec($sql1);

    // Tabla colaboradores
    $sql2 = "
    IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'colaboradores')
    BEGIN
        CREATE TABLE colaboradores (
            id INT IDENTITY(1,1) PRIMARY KEY,
            nombre NVARCHAR(50) NOT NULL,
            apellido NVARCHAR(50) NOT NULL,
            cedula NVARCHAR(20) NOT NULL UNIQUE,
            correo NVARCHAR(100),
            telefono NVARCHAR(20),
            direccion NVARCHAR(150),
            departamento NVARCHAR(50),
            puesto NVARCHAR(50),
            fecha_ingreso DATE,
            salario DECIMAL(12,2)
        )
    END
    ";
    $pdo->exec($sql2);

    echo "Tablas creadas correctamente (si no existían).";

} catch (PDOException $e) {
    echo "Error al crear tablas: " . $e->getMessage();
}
?>
