<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menú Árbol Mejorado</title>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.sidebar {
    background-color: #fff;
    min-height: 100vh;
    border-right: 1px solid #dee2e6;
    width: 250px;
    padding: 10px 0;
}

.sidebar ul {
    list-style: none;
    padding-left: 0;
    margin: 0;
}

.sidebar ul li {
    position: relative;
}
/* Iconos */


/* Contenedor de link + icono */

.sidebar ul li a {
    display: flex;
    align-items: center;
    padding: 8px 15px; /* más compacto */
    color: #000;
    text-decoration: none;
    border-left: 4px solid transparent;
    transition: all 0.2s;
    position: relative;
}

/* Iconos */
.sidebar ul li a img {
    width: 24px;
    height: 24px;
    margin-right: 12px;
    object-fit: contain;
}
.sidebar ul li a:hover {
    background: #f0f0f0;
    border-left: 4px solid #000;
}

/* Submenu */
.has-submenu > .submenu {
    display: none;
    padding-left: 20px;
    position: relative;
}

.has-submenu.open > .submenu {
    display: block;
}

/* Líneas tipo árbol minimalistas */

/* Línea vertical que conecta los hijos */
.submenu li::before {
    content: '';
    position: absolute;
    top: 0;
    left: 12px; /* centro del icono hijo */
    width: 1px;
    height: 100%;
    background: #ccc;
}

/* No dibujar línea vertical en el último hijo */
.submenu li:last-child::before {
    height: 50%; /* corta la línea para que termine en el último item */
}

/* Línea horizontal desde vertical hasta inicio del texto */
.submenu li::after {
    content: '';
    position: absolute;
    top: 50%; /* centro vertical del link */
    left: 12px; /* desde la vertical */
    width: 12px; /* hasta donde inicia el texto */
    height: 1px;
    background: #ccc;
}


/* Iconos */
.sidebar ul li a img {
    margin-right: 8px;
    width: 20px;
    height: 20px;
    margin-left: 10px;
}

/* Móvil */
@media (max-width: 900px) {
    .sidebar {
        width: 100%;
        position: relative;
    }
    .sidebar ul {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }
    .submenu {
        position: absolute;
        background: #fff;
        border: 1px solid #dee2e6;
        padding: 10px;
        display: none;
    }
}

</style>
</head>
<body>
<nav class="sidebar">
<ul>
    <li>
        <a href="/Esnomina/index.php?page=inicio">
            <img src="/Esnomina/views/Iconos/Darshoboard.png" alt="Dashboard">Dashboard
        </a>
    </li>

    <li class="has-submenu">
        <a onclick="toggleSubmenu(this)">
            <img src="/Esnomina/views/Iconos/Empleado.png" alt="Empleados">Empleados 
        </a>
        <ul class="submenu">
            <li><a href="/Esnomina/index.php?page=empleado"><img src="/Esnomina/views/Iconos/AgregarEmpleados.png" alt="Agregar Empleado">Agregar Empleado</a></li>
            <li><a href="/Esnomina/index.php?page=cargos"><img src="/Esnomina/views/Iconos/Cargos.png" alt="Cargos">Cargos</a></li>
            <li><a href="/Esnomina/index.php?page=departamentos"><img src="/Esnomina/views/Iconos/Departamentos.png" alt="Departamentos">Departamentos</a></li>
        </ul>
    </li>

    <li>
        <a href="/Esnomina/index.php?page=nominas">
            <img src="/Esnomina/views/Iconos/Nominas.png" alt="Nominas">Nominas
        </a>
    </li>

    <li class="has-submenu">
        <a onclick="toggleSubmenu(this)">
            <img src="/Esnomina/views/Iconos/Barras.png" alt="Reportes">Reportes 
        </a>
        <ul class="submenu">
            <li><a href="/Esnomina/index.php?page=persenciones"><img src="/Esnomina/views/Iconos/Persenciones.png" alt="Persenciones">Persenciones</a></li>
            <li><a href="/Esnomina/index.php?page=liquidaciones"><img src="/Esnomina/views/Iconos/Liquidacion.png" alt="Liquidaciones">Liquidaciones</a></li>
            <li><a href="/Esnomina/index.php?page=aportesimpuestos"><img src="/Esnomina/views/Iconos/Aportes.png" alt="Aportes e Impuestos">Aportes e Impuestos</a></li>
            
        </ul>
    </li>

    <li class="has-submenu">
        <a onclick="toggleSubmenu(this)">
            <img src="/Esnomina/views/Iconos/TuercaDinero.png" alt="Configuracion">Configuracion 
        </a>
        <ul class="submenu">
            <li><a href="/Esnomina/index.php?page=bancosPagos"><img src="/Esnomina/views/Iconos/Banco.png" alt="Bancos y Pagos">Bancos y Pagos</a></li>
        </ul>
    </li>
</ul>
</nav>

<script>
function toggleSubmenu(el){
    const li = el.parentElement;
    li.classList.toggle('open');
}
</script>
</body>
</html>
