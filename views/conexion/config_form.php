<?php
$config_file = 'config_db.php';

// Cargar configuración actual
$config = require $config_file;

// Guardar cambios si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_config = array(
        'db_type' => $_POST['db_type'],
        'host'    => $_POST['host'],
        'port'    => (int)$_POST['port'],
        'user'    => $_POST['user'],
        'pass'    => $_POST['pass'],
        'db_name' => $_POST['db_name'],
    );

    // Generar contenido PHP para el archivo
    $content = "<?php\nreturn " . var_export($new_config, true) . ";\n?>";

    // Guardar cambios en el archivo
    file_put_contents($config_file, $content);

    // Mostrar confirmación bonita
    echo "
    <div class='alert alert-success alert-dismissible fade show shadow-lg p-4 mb-4 rounded' role='alert' 
         style='font-size: 1.1rem; text-align:center;'>
        <div class='d-flex align-items-center justify-content-center'>
            <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check-circle me-2' viewBox='0 0 16 16'>
                <path d='M15.854 5.146a.5.5 0 0 1 0 .708L7.707 14 4.146 10.439a.5.5 0 1 1 .708-.708L7.707 12.586l7.439-7.44a.5.5 0 0 1 .708 0z'/>
                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
            </svg>
            <strong>¡Configuración guardada correctamente!</strong>
        </div>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
    </div>
    ";

    $config = $new_config; // actualizar para mostrar en el form
}
?>


    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">Configuración de la Base de Datos</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Tipo de BD</label>
                <select name="db_type" class="form-control" required>
                    <option value="sqlsrv" <?= $config['db_type']=='sqlsrv'?'selected':'' ?>>SQL Server</option>
                    <option value="mysql" <?= $config['db_type']=='mysql'?'selected':'' ?>>MySQL</option>
                    <option value="pgsql" <?= $config['db_type']=='pgsql'?'selected':'' ?>>PostgreSQL</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Host</label>
                <input type="text" name="host" value="<?= htmlspecialchars($config['host']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Puerto</label>
                <input type="number" name="port" value="<?= htmlspecialchars($config['port']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="user" value="<?= htmlspecialchars($config['user']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="pass" value="<?= htmlspecialchars($config['pass']) ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre BD</label>
                <input type="text" name="db_name" value="<?= htmlspecialchars($config['db_name']) ?>" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
        </form>
    </div>

