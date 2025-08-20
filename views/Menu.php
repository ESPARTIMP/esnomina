<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;

}

.sidebar {
    background-color: #fff;
    min-height: calc(100vh - 60px); /* Account for nav height */
    height: 100%;
    border-right: 1px solid #dee2e6;
    width: 250px;
    padding: 10px 0;
    margin-top: 0; /* Align with container margin */
}

.sidebar ul {
    list-style: none;
    padding-left: 0;
    margin: 0;
}

.sidebar ul li {
    position: relative;
}

/* Contenedor de link + icono */
.sidebar ul li a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    color: #000;
    text-decoration: none;
    border-left: 4px solid transparent;
    transition: all 0.2s;
    position: relative;
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
    width: 16px;
    height: 16px;
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
<nav class="sidebar shadow-lg">
<ul>
    <li>
        <a href="/Esnomina/index.php?page=inicio">
            <img src="/Esnomina/views/Iconos/Darshoboard.png" alt="Dashboard">Dashboard
        </a>
    </li>
<nav class="sidebar">
<ul>
    <li>
        <a href="/Esnomina/index.php?page=inicio">
            <img src="/Esnomina/views/Iconos/Darshoboard.png" alt="Dashboard">Dashboard
        </a>
    </li>

    <li class="has-submenu">
        <a onclick="toggleSubmenu(this)">
            <img src="/Esnomina/views/Iconos/Empleado.png" alt="Empleados">Empleados <i class="bi bi-chevron-down" style = "margin-left: 5px;"></i>
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
    <li>
        <a href="/Esnomina/index.php?page=nominas">
            <img src="/Esnomina/views/Iconos/Nominas.png" alt="Nominas">Nominas
        </a>
    </li>

    <li class="has-submenu">
        <a onclick="toggleSubmenu(this)">
            <img src="/Esnomina/views/Iconos/Barras.png" alt="Reportes">Reportes <i class="bi bi-chevron-down" style = "margin-left: 5px;"></i>
        </a>
        
        <ul class="submenu">
            <li><a href="/Esnomina/index.php?page=persenciones"><img src="/Esnomina/views/Iconos/Persenciones.png" alt="Persenciones">Persenciones</a></li> 
            <li><a href="/Esnomina/index.php?page=liquidaciones"><img src="/Esnomina/views/Iconos/Liquidacion.png" alt="Liquidaciones">Liquidaciones</a></li>
            <li><a href="/Esnomina/index.php?page=aportesimpuestos"><img src="/Esnomina/views/Iconos/Aportes.png" alt="Aportes e Impuestos">Aportes e Impuestos</a></li>
        </ul>
    </li>

    <li class="has-submenu">
        <a onclick="toggleSubmenu(this)">
            <img src="/Esnomina/views/Iconos/TuercaDinero.png" alt="Configuracion">Configuracion <i class="bi bi-chevron-down" style = "margin-left: 5px;"></i>
        </a>
        <ul class="submenu">
            <li><a href="/Esnomina/index.php?page=bancosPagos"><img src="/Esnomina/views/Iconos/Banco.png" alt="Bancos y Pagos">Bancos y Pagos</a></li>
        </ul>
    </li>
</ul>
</nav>

<script>
// Helpers: load/save open submenu groups (by index)
function loadOpenGroups() {
    try { return JSON.parse(localStorage.getItem('openMenuGroups') || '[]'); } catch { return []; }
}
function saveOpenGroups(idxs) {
    localStorage.setItem('openMenuGroups', JSON.stringify(idxs));
}
function getSubmenuGroups() {
    return Array.from(document.querySelectorAll('.has-submenu'));
}

// Toggle that does NOT close others; persists current open set
function toggleSubmenu(el){
    const li = el.closest('.has-submenu');
    if (!li) return;
    li.classList.toggle('open');
    const groups = getSubmenuGroups();
    const openIdx = groups.reduce((acc, g, i) => { if (g.classList.contains('open')) acc.push(i); return acc; }, []);
    saveOpenGroups(openIdx);
}

// Restore state on load and ensure the group of the current page stays open
document.addEventListener('DOMContentLoaded', () => {
    const groups = getSubmenuGroups();

    // Restore all previously open groups
    const saved = loadOpenGroups();
    saved.forEach(i => { if (groups[i]) groups[i].classList.add('open'); });

    // Also open the group containing the current ?page=
    const page = new URLSearchParams(location.search).get('page');
    if (page) {
        const link = Array.from(document.querySelectorAll('.submenu a')).find(a => {
            try { return new URL(a.href, location.origin).searchParams.get('page') === page; } catch { return false; }
        });
        if (link) {
            const li = link.closest('.has-submenu');
            if (li) li.classList.add('open');
        }
    }

    // Before navigating via a subitem, persist the current open groups
    document.querySelectorAll('.submenu a').forEach(a => {
        a.addEventListener('click', () => {
            const now = getSubmenuGroups().reduce((acc, g, i) => { if (g.classList.contains('open')) acc.push(i); return acc; }, []);
            saveOpenGroups(now);
        });
    });
});
</script>
