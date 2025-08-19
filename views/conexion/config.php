<?php
// Archivo: config.php

$config_file = 'config_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['db_type'])) {

    // Configuración enviada por formulario
    $config = [
        'db_type' => $_POST['db_type'],
        'host'    => $_POST['host'],
        'port'    => $_POST['port'] ?? ($_POST['db_type'] === 'pgsql' ? 5432 : 1433),
        'user'    => $_POST['user'],
        'pass'    => $_POST['pass'],
        'db_name' => $_POST['db_name']
    ];

    // Guardar en config_db.php
    $content = "<?php\nreturn " . var_export($config, true) . ";\n?>";
    if(file_put_contents($config_file, $content)) {
        echo "<div style='text-align:center;margin-top:50px;'>Configuración guardada correctamente. <a href='conexion.php'>Probar conexión</a></div>";
    } else {
        echo "Error al guardar la configuración.";
    }

} else {
    die("No se recibieron datos del formulario.");
}
