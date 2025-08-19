<?php
$config_file = __DIR__ .'/config_db.php';

// Verificar que exista la configuración
if (!file_exists($config_file)) {
    die("Archivo de configuración no encontrado. Completa primero el formulario.");
}

$config = require $config_file;

$db_type = $config['db_type'];
$host    = $config['host'];
$port    = $config['port'];
$user    = $config['user'];
$pass    = $config['pass'];
$db_name = $config['db_name'];

function getConexion($db_type, $host, $user, $pass, $db_name, $port) {
    try {
        if ($db_type == 'pgsql') {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            ];

            // Conectar a postgres para crear DB si no existe
            $pdo = new PDO("pgsql:host=$host;dbname=postgres", $user, $pass, $options);
            $stmt = $pdo->query("SELECT 1 FROM pg_database WHERE datname='$db_name'");
            if ($stmt->fetchColumn() === false) {
                $pdo->exec("CREATE DATABASE $db_name");
            }

            // Conectarse a la DB
            $pdo = new PDO("pgsql:host=$host;dbname=$db_name", $user, $pass, $options);

            // Crear tabla de ejemplo
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS empleados (
                    id SERIAL PRIMARY KEY,
                    nombre VARCHAR(100),
                    apellido VARCHAR(100),
                    correo VARCHAR(100)
                );
            ");

        } else if ($db_type == 'sqlsrv') {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            // Conectar a master para crear DB si no existe
            $pdo = new PDO("sqlsrv:Server=$host,$port;Database=master", $user, $pass, $options);
            $stmt = $pdo->query("SELECT database_id FROM sys.databases WHERE Name = '$db_name'");
            if ($stmt->fetchColumn() === false) {
                $pdo->exec("CREATE DATABASE [$db_name]");
            }

            // Conectarse a la DB
            $pdo = new PDO("sqlsrv:Server=$host,$port;Database=$db_name", $user, $pass, $options);

            // Crear tabla de ejemplo
            $pdo->exec("
                IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='empleados' AND xtype='U')
                CREATE TABLE empleados (
                    id INT IDENTITY(1,1) PRIMARY KEY,
                    nombre NVARCHAR(100),
                    apellido NVARCHAR(100),
                    correo NVARCHAR(100)
                );
            ");
        }

        return $pdo;

    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

// Variable global
$pdo = getConexion($db_type, $host, $user, $pass, $db_name, $port);
//echo "Conexión exitosa a $db_type";
?>
