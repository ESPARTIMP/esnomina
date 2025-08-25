<!-- estilos del menú -->
<link rel="stylesheet" href="/Esnomina/assets/css/menu.css">

<!-- Sidebar de navegación principal -->
<nav class="sidebar shadow-lg">
    <ul>
        <li class="element-principal">
            <a href="/Esnomina/index.php?page=inicio">
                <img src="/Esnomina/views/Iconos/Darshoboard.png" alt="Dashboard">Dashboard
            </a>
        </li>

        <li class="has-submenu element-principal">
            <a onclick="toggleSubmenu(this)">
                <img src="/Esnomina/views/Iconos/Empleado.png" alt="Empleados">Empleados <i class="bi bi-chevron-down" style="margin-left: 5px;"></i>
            </a>
            <ul class="submenu">
                <li><a href="/Esnomina/empleado"><img src="/Esnomina/views/Iconos/AgregarEmpleados.png" alt="Agregar Empleado">Agregar Empleado</a></li>
                <li><a href="/Esnomina/cargos"><img src="/Esnomina/views/Iconos/Cargos.png" alt="Cargos">Cargos</a></li>
                <li><a href="/Esnomina/departamentos"><img src="/Esnomina/views/Iconos/Departamentos.png" alt="Departamentos">Departamentos</a></li>
            </ul>
        </li>

        <li class="element-principal">
            <a href="/Esnomina/index.php?page=nominas">
                <img src="/Esnomina/views/Iconos/Nominas.png" alt="Nominas">Nominas
            </a>
        </li>

        <li class="element-principal">
            <a href="/Esnomina/index.php?page=reportes">
                <img src="/Esnomina/views/Iconos/Barras.png" alt="Reportes">Reportes
            </a>
        </li>

        <li class="has-submenu element-principal">
            <a onclick="toggleSubmenu(this)">
                <img src="/Esnomina/views/Iconos/TuercaDinero.png" alt="Configuracion">Configuracion <i class="bi bi-chevron-down" style="margin-left: 5px;"></i>
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

// Toggle submenu and persist state
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
