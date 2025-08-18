<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <style>
        
        .sidebar {
            background-color: #fff;
            min-height: 100vh;
            border-right: 1px solid #dee2e6;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            color: #000000ff;
        }
        .sidebar ul li {
            margin-bottom: 15px;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 15px 10px;
            color: #000000ff;
            text-decoration: none;
            font-size: 1.1rem;
            border-left: 4px solid transparent;
            transition: background 0.2s, border-color 0.2s;
        }
        .sidebar ul li a:hover {
            background: #c6c6d3ff;
            border-left: 4px solid #000000ff;
        }

        /* Estilos submenu */
        .submenu {
            display: none;
            list-style: none;
            padding-left: 35px;
            margin: 5px 0;
        }
        /* Aplica estilos tanto si hay <li> como si hay <a> directos dentro del submenu */
        .submenu a,
        .submenu li a {
            font-size: 0.95rem;
            padding: 8px 0;
            display: block;
            color: #333;
            text-decoration: none;
        }
        .submenu a:hover,
        .submenu li a:hover {
            color: #000000ff;
            background: #f0f0f0;
        }
        /* Líneas separadoras al desplegar e indentación extra */
        .has-submenu.open > .submenu > a,
        .has-submenu.open > .submenu > li > a {
          display: block;
          border-top: 1px solid #eee;
          padding: 10px 10px 10px 46px; /* un poco más a la derecha */
        }
        .has-submenu.open > .submenu > a:first-child,
        .has-submenu.open > .submenu > li:first-child > a {
          border-top: none;
        }
        .has-submenu.open > .submenu {
            display: block;
            border-left: 2px solid #ddd; /* línea en el lado izquierdo al desplegar */
            margin-left: 12px;            /* separa del item padre */
            padding-left: 16px;           /* sangría interior */
        }
        .has-submenu > a {
            cursor: pointer;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 100vw;
                height: auto;
                position: relative;
                flex-direction: row;
                top: 60px;
                left: 0;
                box-shadow: none;
                padding-top: 0;
            }
            .sidebar ul {
                display: flex;
                flex-direction: row;
                justify-content: space-around;
            }
            .sidebar ul li a {
                padding: 10px 10px;
                font-size: 1rem;
                border-left: none;
                border-bottom: 2px solid transparent;
            }
            .sidebar ul li a:hover {
                border-bottom: 2px solid #000000ff;
                background: #eaeaea;
            }
            .submenu {
                position: absolute;
                background: #fff;
                border: 1px solid #dee2e6;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="sidebar" id="sidebar">
        <ul class="list-unstyled m-0 p-3">
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=inicio">
                    <img src="/Esnomina/views/Iconos/Darshoboard.png" alt="Dashboard" width="20" height="20" class="me-2">Dashboard
                </a>
            </li>

            <!-- EMPLEADOS con SUBMENÚ -->
            <li class="mb-2 has-submenu">
                <a href="javascript:void(0)" onclick="toggleSubmenu(this)">
                    <img src="/Esnomina/views/Iconos/Empleado.png" alt="Empleados" width="28" height="20" class="me-2">Empleados +
                </a>
                <ul class="submenu">
                   <a href="/Esnomina/index.php?page=empleado">
                    <img src="/Esnomina/views/Iconos/AgregarEmpleados.png"
                     alt="AgregarEmpleado" width="20" height="20" class="me-2">Agregar Empleado
                   </a>
                    <a href="/Esnomina/index.php?page=cargos">
                    <img src="/Esnomina/views/Iconos/Cargos.png" alt="cargos" width="20" height="20" class="me-2">Cargos
                   </a>
                    <a href="/Esnomina/index.php?page=departamentos">
                    <img src="/Esnomina/views/Iconos/Departamentos.png" alt="Departamentos" width="20" height="20" class="me-2">Departamentos
                   </a>
                </ul>
            </li>

            <li class="mb-2">
                <a href="/Esnomina/index.php?page=nominas">
                    <img src="/Esnomina/views/Iconos/Nominas.png" alt="Nominas" width="28" height="26" class="me-2">Nominas
                </a>
            </li>

             <li class="mb-2 has-submenu">
                <a href="javascript:void(0)" onclick="toggleSubmenu(this)">
                    <img src="/Esnomina/views/Iconos/Barras.png" alt="Reportes" width="20" height="22" class="me-2">Reportes +
                </a>
                <ul class="submenu"> 
                    <a href="/Esnomina/index.php?page=persenciones">
                    <img src="/Esnomina/views/Iconos/Persenciones.png" alt="Persenciones" width="20" height="20" class="me-2">Persenciones
                   </a> 
                    <a href="/Esnomina/index.php?page=liquidaciones">
                       <img src="/Esnomina/views/Iconos/Liquidacion.png" alt="Liquidaciones" width="20" height="20" class="me-2">Liquidaciones
                    </a>
                <a href="/Esnomina/index.php?page=aportesimpuestos">
                    <img src="/Esnomina/views/Iconos/Aportes.png" alt="Aportes e Impuestos" width="28" height="26" class="me-2">Aportes e Impuestos
                </a>
                </ul>
             </li>
             <li class="mb-2 has-submenu">
                <a href="javascript:void(0)" onclick="toggleSubmenu(this)">
                    <img src="/Esnomina/views/Iconos/TuercaDinero.png" alt="Reportes" width="20" height="22" class="me-2">Configuracion +
                </a>
                <ul class="submenu"> 
                    <a href="/Esnomina/index.php?page=bancosPagos">
                    <img src="/Esnomina/views/Iconos/Banco.png" alt="Bancos y Pagos" width="20" height="20" class="me-2">Bancos y Pagos
                   </a> 
                </ul>
             </li>
           </ul>
    </nav>
    
    <script>
        function toggleSubmenu(element) {
            const parent = element.parentElement;
            parent.classList.toggle("open");
        }
    </script>
</body>
</html>
