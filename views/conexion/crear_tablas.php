<?php
require 'conexion.php';

// Ejemplo: tabla empleados
try {
    if ($db_type == 'pgsql') {
        $sql = "CREATE TABLE IF NOT EXISTS empleados (
            id SERIAL PRIMARY KEY,
            nombre VARCHAR(100),
            apellido VARCHAR(100),
            cedula VARCHAR(20),
            sueldo NUMERIC(10,2)
        )";
    } else {
        $sql = "IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='empleados' AND xtype='U')
                CREATE TABLE empleados (
                    id INT IDENTITY(1,1) PRIMARY KEY,
                    nombre NVARCHAR(100),
                    apellido NVARCHAR(100),
                    cedula NVARCHAR(20),
                    sueldo DECIMAL(10,2)
                )";
    }

    $pdo->exec($sql);
    echo "Tabla empleados creada o ya existente.";
} catch (PDOException $e) {
    die("Error creando tabla: " . $e->getMessage());
}
?>
