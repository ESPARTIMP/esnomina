<?php
// Puedes proteger este panel con login aquí
$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Interno</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .sidebar {
      height: 100vh;
      background: #212529;
      color: #fff;
      padding: 15px;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 10px;
      border-radius: 8px;
    }
    .sidebar a:hover, .sidebar .active {
      background: #0d6efd;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    
    <!-- Menú lateral -->
    <nav class="col-md-2 sidebar">
      <h4 class="mb-4">⚙️ Panel Interno</h4>
      <a href="menu_principal.php?page=home" class="<?= $page=='home'?'active':'' ?>"><i class="bi bi-house"></i> Inicio</a>
      <a href="menu_principal.php?page=Conexion" class="<?= $page=='Conexion'?'active':'' ?>"><i class="bi bi-database"></i> Conexiones BD</a>
      <a href="menu_principal.php?page=backups" class="<?= $page=='backups'?'active':'' ?>"><i class="bi bi-cloud-arrow-down"></i> Copias de seguridad</a>
      <a href="menu_principal.php?page=" class="<?= $page==''?'active':'' ?>"><i class="bi bi-gear"></i> Datos técnicos</a>
      <a href="menu_principal.php?page=config" class="<?= $page=='config'?'active':'' ?>"><i class="bi bi-sliders"></i> Configuración</a>
    </nav>

    <!-- Contenido -->
    <main class="col-md-10 p-4">
      <?php
      switch($page) {
        case 'conexion2': include 'conexion.php'; break;
        case 'backups': include 'backups.php'; break;
        case 'Conexion': include 'config_form.php'; break;
        case 'config': include 'config.php'; break;
        default: echo "<h2>Bienvenido al Panel Interno</h2><p>Selecciona una opción del menú lateral.</p>";
      }
      ?>
    </main>

  </div>
</div>
</body>
</html>
