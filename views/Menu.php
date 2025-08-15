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
        .sidebar h1 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 30px;
            letter-spacing: 2px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            color: #000000ff;
        }
        .sidebar ul li {
            margin-bottom: 15px;
            margin-top:15%;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 15px 3px;
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
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <ul class="list-unstyled m-0 p-3">
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=inicio" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Darshoboard.png" alt="Dashboard" width="20" height="20" class="me-2">Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=empleado" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Empleado.png" alt="Empleados" width="20" height="22" class="me-2">Empleados
                </a>
            </li>
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=nominas" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Nominas.png" alt="Nominas" width="28" height="26" class="me-2">Nominas
                </a>
            </li>
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=departamentos" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Persenciones.png" alt="Departamentos" width="28" height="24" class="me-2">Cargos y Departamentos
                </a>
            </li>
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=aportesimpuestos" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Aportes.png" alt="Aportes e Impuestos" width="28" height="26" class="me-2">Aportes e Impuestos
                </a>
            </li>
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=configuracion" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Tuerca.png" alt="Configuración" width="28" height="28" class="me-2">Configuración
                </a>
            </li>
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=liquidaciones" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Liquidacion.png" alt="Liquidaciones" width="28" height="26" class="me-2">Liquidaciones
                </a>
            </li>
            <li class="mb-2">
                <a href="/Esnomina/index.php?page=reportes" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded">
                    <img src="/Esnomina/views/Iconos/Barras.png" alt="Reportes" width="24" height="28" class="me-2">Reportes
                </a>
            </li>
        </ul>
    </nav>
</body>
</html>