<?php
$pagina = $_GET['page'] ?? 'inicio';


$rutas = [
    'inicio' => 'views/index.php',
    'empleado' => 'views/Empleado.php',
    'departamentos' => 'views/Departamento.php',
    'aportesimpuestos' => 'views/AportesImpuestos.php',
    'configuracion' => 'views/Configuracion.php',
    'liquidaciones' => 'views/Liquidaciones.php',
    'menu' => 'views/Menu.php',
    'nominas' => 'views/Nominas.php',
    'reportes' => 'views/Reportes.php',
    'login' => 'views/Login/Login.php',
    'CrearEmpleado' =>'views/Login/Login.php',
    'cargos' => 'views/Cargos.php',
    'persenciones' => 'views/Persenciones.php',
    'bancosPagos' =>'views/BancosPagos.php',
    'nav' => 'views/Nav.php'
    
    
];

$ruta = $rutas[$_GET['page'] ?? 'inicio'] ?? null;

if ($ruta && file_exists($ruta)) {
    require $ruta;
} else {
    http_response_code(404);
    exit; // ← Nada más, esto muestra el error 404 puro del servidor
}
?>



