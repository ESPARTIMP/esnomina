<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Base de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 20px;
            padding: 2rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            background: white;
        }
        .card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #4b0082;
        }
        .form-label {
            font-weight: 500;
            color: #4b0082;
        }
        .btn-primary {
            background: #4b0082;
            border: none;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background: #34115a;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Configuración Base de Datos</h2>
    <form method="post" action="config_db.php">
        <div class="mb-3">
            <label class="form-label">Seleccione base de datos:</label>
            <select class="form-select" name="db_type">
                <option value="pgsql" selected>PostgreSQL (predeterminada)</option>
                <option value="sqlsrv">SQL Server</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Servidor:</label>
            <input type="text" class="form-control" name="host" value="localhost">
        </div>

        <div class="mb-3">
            <label class="form-label">Usuario:</label>
            <input type="text" class="form-control" name="user" value="root">
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="pass">
        </div>

        <div class="mb-4">
            <label class="form-label">Base de datos:</label>
            <input type="text" class="form-control" name="db_name" value="nomina">
        </div>

        <button type="submit" class="btn btn-primary">Guardar configuración</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
