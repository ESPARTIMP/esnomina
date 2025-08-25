<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reportes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{
    --navy:#15133B;     /* azul marino (iconos/textos) */
    --bg-ice:#F4F6FE;   /* blanco azulado del módulo (extraído de tu mock) */
    --tile:#FFFFFF;     /* tarjetas blancas */
    --lilac:#9B9AE9;    /* lila pastel del botón Ver (muy cercano al tuyo) */
    --lilac-hover:#8D8AE0;
    --head-muted:#EEF2FF;  /* cabecera de tablas */
    --muted:#7F89A6;
    --glow:#2546FF;     /* glow azul para laterales del modal */
  }
  *{ font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }

  body{ background:var(--bg-ice); }

  /* Barra superior blanca de extremo a extremo */
  .topbar{
    background:#fff; height:68px; display:flex; align-items:center; padding:0 20px;
    border-bottom:1px solid rgba(0,0,0,.06);
  }
  .topbar .title{ color:var(--navy); font-weight:800; font-size:22px; display:flex; gap:10px; align-items:center; }
  .topbar .title i{ color:var(--navy); }

  /* Layout con sidebar mock (visual) */
  .layout{ display:grid; grid-template-columns:260px 1fr; min-height:calc(100vh - 68px); }
  .sidebar{ background:#fff; border-right:1px solid rgba(0,0,0,.06); padding:16px 14px; }
  .side-head{ color:var(--navy); font-weight:800; display:flex; gap:10px; align-items:center; margin: 4px 8px 16px; }
  .side-item, .side-sub{
    color:#7A8295; text-decoration:none; display:flex; align-items:center; gap:10px;
    padding:8px 10px; border-radius:10px;
  }
  .side-item.active{ background:rgba(21,19,59,.08); color:var(--navy); }
  .side-sub{ padding-left:26px; }
  .side-divider{ height:1px; background:rgba(0,0,0,.06); margin:10px 0 14px; }

  /* Contenido */
  .content{ padding:18px 24px; }

  /* Tarjetas compactas (solo esquina inferior derecha redondeada) */
  .report-tile{
    background:var(--tile); border:none; border-radius:0; border-bottom-right-radius:16px;
    box-shadow:0 8px 18px rgba(0,0,0,.06);
    padding:14px 16px; display:flex; align-items:center; justify-content:space-between; gap:12px;
  }
  .tile-left{ display:flex; align-items:center; gap:12px; }
  .tile-icon{
    width:38px; height:38px; display:grid; place-items:center;
    color:var(--navy); font-size:19px; background:#ffffff; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,.06);
  }
  .tile-title{ color:var(--navy); font-weight:800; font-size:15px; }

  .btn-ver{
    background:var(--lilac); color:#fff; border:none; padding:6px 14px; font-weight:700; border-radius:12px;
  }
  .btn-ver:hover{ background:var(--lilac-hover); color:#fff; }

  /* MODALES: borde limpio, glow azul lateral, transparencia en backdrop */
  .modal-backdrop.show{ background:rgba(18,24,64,.35); backdrop-filter:blur(2px); }
  .modal-content{
    border:none; border-radius:0; border-bottom-right-radius:16px;
    position:relative;
    box-shadow:
      0 12px 30px rgba(0,0,0,.12),
      inset 0 0 0 1px rgba(0,0,0,.04);
  }
  /* Glow azul sutil en laterales (como en tu mock) */
  .modal-content::before, .modal-content::after{
    content:""; position:absolute; top:6px; bottom:6px; width:6px; border-radius:6px;
    filter: blur(4px); opacity:.55; pointer-events:none;
  }
  .modal-content::before{ left:-2px; background:linear-gradient(180deg, rgba(37,70,255,.6), rgba(37,70,255,0)); }
  .modal-content::after{ right:-2px; background:linear-gradient(0deg, rgba(37,70,255,.6), rgba(37,70,255,0)); }

  .modal-header{ border-bottom:2px solid rgba(0,0,0,.08); background:#fff; padding:10px 16px; }
  .modal-title{ color:var(--navy); font-weight:800; font-size:16px; display:flex; gap:8px; align-items:center; }
  .modal-header .btn-close{ filter: invert(20%); opacity:.85; }

  .modal-body{ background:#fff; }

  /* Bloque de filtros dentro del modal */
  .filter-block{
    background:#fff; border:1px solid rgba(0,0,0,.08); border-radius:0; border-bottom-right-radius:14px;
    padding:12px; box-shadow:0 10px 20px rgba(0,0,0,.06);
  }
  .filter-label{ color:var(--navy); font-weight:800; font-size:14px; margin-bottom:6px; }
  .input-ghost, .form-select{ background:#F3F5FF; border:1px solid transparent; color:#1F2740; }
  .input-ghost:focus, .form-select:focus{ border-color:#D7DAF1; box-shadow:none; background:#EFF2FF; }
  .inline-actions{ display:flex; gap:8px; justify-content:flex-end; }
  .btn-clean{ background:#E8ECF9; color:#4C5876; border:none; font-weight:700; }
  .btn-apply{ background:var(--lilac); color:#fff; border:none; font-weight:800; }
  .btn-apply:hover{ background:var(--lilac-hover); }
  .btn-clean:hover{ filter:brightness(.98); }

  /* Tabla */
  .table-wrap{
    background:#fff; border:1px solid rgba(0,0,0,.08); border-radius:0; border-bottom-right-radius:14px;
    box-shadow:0 8px 18px rgba(0,0,0,.06); overflow:hidden;
  }
  table thead th{ background:var(--head-muted); color:#5C6690; font-weight:800; border-bottom:none; }
  table tbody td{ color:#2B3150; }
  tfoot th, tfoot td{ background:#F6F7FF; font-weight:800; color:#1E2544; }

  .green-badge{ background:#E6FBEE; color:#108F55; font-weight:800; padding:2px 10px; border-radius:10px; }

  /* PDF / EXEL al pie derecho */
  .export-actions{ display:flex; gap:8px; justify-content:flex-end; margin-top:10px; }
  .btn-export{ background:var(--lilac); color:#fff; border:none; padding:6px 12px; border-radius:10px; font-weight:800; }
  .btn-export:hover{ background:var(--lilac-hover); color:#fff; }

  /* Texto auxiliar */
  .muted{ color:var(--muted); font-size:12px; }
</style>
</head>
<body>

  <!-- Barra superior -->
  <div class="topbar">
    <div class="title"><i class="bi bi-bar-chart-fill"></i> Reportes</div>
  </div>

  <div class="layout">
    <!-- Sidebar (decorativo para que se vea como tu mock) -->
    <aside class="sidebar">
      <div class="side-head"><i class="bi bi-columns-gap"></i> Reportes</div>
      <a href="#" class="side-item"><i class="bi bi-speedometer2"></i> Dashboard</a>
      <div class="side-divider"></div>
      <a href="#" class="side-item"><i class="bi bi-people"></i> Empleados</a>
      <a href="#" class="side-sub"><i class="bi bi-person-plus"></i> Agregar Empleados</a>
      <a href="#" class="side-sub"><i class="bi bi-briefcase"></i> Cargos</a>
      <a href="#" class="side-sub"><i class="bi bi-building"></i> Departamentos</a>
      <div class="side-divider"></div>
      <a href="#" class="side-item"><i class="bi bi-cash-coin"></i> Nóminas</a>
      <a href="#" class="side-item active"><i class="bi bi-bar-chart-steps"></i> Reportes</a>
      <div class="side-divider"></div>
      <a href="#" class="side-item"><i class="bi bi-gear"></i> Configuración</a>
      <a href="#" class="side-sub"><i class="bi bi-bank"></i> Bancos y Pagos</a>
    </aside>

    <!-- Contenido principal -->
    <main class="content">
      <div class="row g-3">
        <!-- Percepciones y Deducciones -->
        <div class="col-12 col-md-6 col-xl-4">
          <div class="report-tile">
            <div class="tile-left">
              <div class="tile-icon"><i class="bi bi-coin"></i></div>
              <div class="tile-title">Percepciones y Deducciones</div>
            </div>
            <button class="btn-ver" data-bs-toggle="modal" data-bs-target="#modalPyD">Ver</button>
          </div>
        </div>
        <!-- Liquidaciones -->
        <div class="col-12 col-md-6 col-xl-4">
          <div class="report-tile">
            <div class="tile-left">
              <div class="tile-icon"><i class="bi bi-person-lines-fill"></i></div>
              <div class="tile-title">Liquidaciones</div>
            </div>
            <button class="btn-ver" data-bs-toggle="modal" data-bs-target="#modalLiqui">Ver</button>
          </div>
        </div>
        <!-- Aportes e Impuestos -->
        <div class="col-12 col-md-6 col-xl-4">
          <div class="report-tile">
            <div class="tile-left">
              <div class="tile-icon"><i class="bi bi-bank"></i></div>
              <div class="tile-title">Aportes e Impuestos</div>
            </div>
            <button class="btn-ver" data-bs-toggle="modal" data-bs-target="#modalAportes">Ver</button>
          </div>
        </div>
        <!-- Horas Extras -->
        <div class="col-12 col-md-6 col-xl-4">
          <div class="report-tile">
            <div class="tile-left">
              <div class="tile-icon"><i class="bi bi-clock-history"></i></div>
              <div class="tile-title">Horas Extras</div>
            </div>
            <button class="btn-ver" data-bs-toggle="modal" data-bs-target="#modalHoras">Ver</button>
          </div>
        </div>
        <!-- Vacaciones -->
        <div class="col-12 col-md-6 col-xl-4">
          <div class="report-tile">
            <div class="tile-left">
              <div class="tile-icon"><i class="bi bi-brightness-high"></i></div>
              <div class="tile-title">Vacaciones</div>
            </div>
            <button class="btn-ver" data-bs-toggle="modal" data-bs-target="#modalVacaciones">Ver</button>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- ================== MODALES ================== -->

  <!-- APORTES E IMPUESTOS -->
  <div class="modal fade" id="modalAportes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title"><i class="bi bi-x-lg"></i> Reporte de Aportes e Impuestos</div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="filter-block mb-3">
            <div class="row g-3 align-items-end">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Consultas</div>
                <select class="form-select">
                  <option selected>— Seleccionar —</option>
                  <option>Por empleado</option>
                  <option>Por departamento</option>
                  <option>Consolidado</option>
                </select>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Periodo</div>
                <div class="d-flex gap-2">
                  <input type="date" class="form-control input-ghost">
                  <input type="date" class="form-control input-ghost">
                </div>
              </div>
              <div class="col-12 col-xl-4">
                <div class="inline-actions">
                  <button class="btn btn-clean">Limpiar</button>
                  <button class="btn btn-apply">Aplicar</button>
                </div>
              </div>
            </div>
          </div>

          <div class="table-wrap">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr>
                    <th>Empleado</th><th>AFP</th><th>ARS</th><th>INFOTEP</th><th>ISR</th><th>Total De Aportes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td>Juan Pérez</td><td>1,200</td><td>800</td><td>350</td><td>1,000</td><td>$3,350</td></tr>
                  <tr><td>Verónica Lugo</td><td>1,100</td><td>750</td><td>310</td><td>900</td><td>$3,090</td></tr>
                </tbody>
                <tfoot>
                  <tr><th>Total General</th><th>2,300</th><th>1,550</th><th>660</th><th>1,900</th><th>$6,440</th></tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="export-actions">
            <button class="btn-export" data-export="pdf">PDF</button>
            <button class="btn-export" data-export="excel">EXEL</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- LIQUIDACIONES -->
  <div class="modal fade" id="modalLiqui" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title"><i class="bi bi-x-lg"></i> Reporte de Liquidaciones</div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="filter-block mb-3">
            <div class="row g-3 align-items-end">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Consultas</div>
                <select class="form-select">
                  <option selected>— Seleccionar —</option>
                  <option>Por empleado</option>
                  <option>Por motivo</option>
                </select>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Periodo</div>
                <div class="d-flex gap-2">
                  <input type="date" class="form-control input-ghost">
                  <input type="date" class="form-control input-ghost">
                </div>
              </div>
              <div class="col-12 col-xl-4">
                <div class="inline-actions">
                  <button class="btn btn-clean">Limpiar</button>
                  <button class="btn btn-apply">Aplicar</button>
                </div>
              </div>
            </div>
          </div>

          <div class="table-wrap">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr><th>Empleado</th><th>Fecha</th><th>Motivo</th><th>Monto De Liquidación</th></tr>
                </thead>
                <tbody>
                  <tr><td>Juan Pérez</td><td>01/03/04</td><td>Renuncia</td><td>$25,000</td></tr>
                  <tr><td>Verónica Lugo</td><td>01/03/04</td><td>Despido</td><td>$32,000</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="export-actions">
            <button class="btn-export" data-export="pdf">PDF</button>
            <button class="btn-export" data-export="excel">EXEL</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PERCEPCIONES Y DEDUCCIONES -->
  <div class="modal fade" id="modalPyD" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title"><i class="bi bi-x-lg"></i> Percepciones y Deducciones</div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="filter-block mb-3">
            <div class="row g-3 align-items-end">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Empleado</div>
                <select class="form-select">
                  <option selected>— Seleccionar —</option>
                  <option>Juan Pérez</option>
                  <option>Verónica Lugo</option>
                </select>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Periodo</div>
                <div class="d-flex gap-2">
                  <input type="date" class="form-control input-ghost">
                  <input type="date" class="form-control input-ghost">
                </div>
              </div>
              <div class="col-12 col-xl-4">
                <div class="inline-actions">
                  <button class="btn btn-clean">Limpiar</button>
                  <button class="btn btn-apply">Aplicar</button>
                </div>
              </div>
            </div>
          </div>

          <div class="table-wrap">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr><th>Concepto</th><th>Percepción</th><th>Deducción</th></tr>
                </thead>
                <tbody>
                  <tr><td>Sueldo Base</td><td>$30,000</td><td>$0</td></tr>
                  <tr><td>Horas Extra</td><td>$5,000</td><td>$0</td></tr>
                  <tr><td>AFP</td><td>$0</td><td>$2,500</td></tr>
                  <tr><td>Seguro De Salud</td><td>$0</td><td>$1,500</td></tr>
                </tbody>
                <tfoot>
                  <tr><th>Totales</th><th>$35,000</th><th>$4,000</th></tr>
                  <tr><th>Neto a Pagar</th><td colspan="2"><span class="green-badge">$31,000</span></td></tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="export-actions">
            <button class="btn-export" data-export="pdf">PDF</button>
            <button class="btn-export" data-export="excel">EXEL</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- HORAS EXTRAS -->
  <div class="modal fade" id="modalHoras" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title"><i class="bi bi-x-lg"></i> Reporte de Horas Extras</div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="filter-block mb-3">
            <div class="row g-3 align-items-end">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Consultas</div>
                <select class="form-select">
                  <option selected>— Seleccionar —</option>
                  <option>Por empleado</option>
                  <option>Por tipo</option>
                  <option>Consolidado</option>
                </select>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Periodo</div>
                <div class="d-flex gap-2">
                  <input type="date" class="form-control input-ghost">
                  <input type="date" class="form-control input-ghost">
                </div>
              </div>
              <div class="col-12 col-xl-4">
                <div class="inline-actions">
                  <button class="btn btn-clean">Limpiar</button>
                  <button class="btn btn-apply">Aplicar</button>
                </div>
              </div>
            </div>
          </div>

          <div class="table-wrap">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr><th>Empleado</th><th>Tipo</th><th>Horas</th><th>Monto</th></tr>
                </thead>
                <tbody>
                  <tr><td>Juan Pérez</td><td>Nocturnas</td><td>6</td><td>$1,800</td></tr>
                  <tr><td>Verónica Lugo</td><td>Festivas</td><td>4</td><td>$1,400</td></tr>
                </tbody>
                <tfoot>
                  <tr><th>Total</th><th>—</th><th>10</th><th>$3,200</th></tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="export-actions">
            <button class="btn-export" data-export="pdf">PDF</button>
            <button class="btn-export" data-export="excel">EXEL</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- VACACIONES -->
  <div class="modal fade" id="modalVacaciones" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title"><i class="bi bi-x-lg"></i> Reporte de Vacaciones</div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="filter-block mb-3">
            <div class="row g-3 align-items-end">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Consultas</div>
                <select class="form-select">
                  <option selected>— Seleccionar —</option>
                  <option>Pendientes</option>
                  <option>Aprobadas</option>
                  <option>Pagadas</option>
                </select>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="filter-label">Periodo</div>
                <div class="d-flex gap-2">
                  <input type="date" class="form-control input-ghost">
                  <input type="date" class="form-control input-ghost">
                </div>
              </div>
              <div class="col-12 col-xl-4">
                <div class="inline-actions">
                  <button class="btn btn-clean">Limpiar</button>
                  <button class="btn btn-apply">Aplicar</button>
                </div>
              </div>
            </div>
          </div>

          <div class="table-wrap">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr><th>Empleado</th><th>Días</th><th>Desde</th><th>Hasta</th><th>Estado</th></tr>
                </thead>
                <tbody>
                  <tr><td>Juan Pérez</td><td>7</td><td>2025-03-01</td><td>2025-03-07</td><td>Aprobadas</td></tr>
                  <tr><td>Verónica Lugo</td><td>5</td><td>2025-03-10</td><td>2025-03-14</td><td>Pendientes</td></tr>
                </tbody>
                <tfoot>
                  <tr><th>Total</th><th>12</th><th colspan="3">—</th></tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="export-actions">
            <button class="btn-export" data-export="pdf">PDF</button>
            <button class="btn-export" data-export="excel">EXEL</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Mock: exportaciones y filtros
    document.querySelectorAll('.btn-export').forEach(b=>b.addEventListener('click',()=>alert('Exportación simulada')));
    document.querySelectorAll('.btn-clean').forEach(b=>b.addEventListener('click',()=>alert('Filtros limpiados')));
    document.querySelectorAll('.btn-apply').forEach(b=>b.addEventListener('click',()=>alert('Filtros aplicados')));
  </script>
</body>
</html>