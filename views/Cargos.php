<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Empleados</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
     
     
    <link rel="stylesheet" href="/Esnomina/assets/css/styles.css">

    <link rel="stylesheet" href="/Esnomina/assets/css/formulario.css">
    <script>
    function mostrarVistaPrevia(event) {
        const input = event.target;
        const preview = document.getElementById('vistaPreviaFoto');
        if (input.files && input.files[0]) {
            preview.src = URL.createObjectURL(input.files[0]);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }
    </script>
      
     <style>
        /* Estilos para quitar bordes de la card */
        .card.border-0 {
            border: none !important;
        }
        
        .card-header {
            background-color: transparent;
            border-bottom: none !important;
            padding: 1.25rem 1.25rem 0.5rem;
        }
        
        /* Eliminar bordes de la tabla */
        .table-borderless th,
        .table-borderless td {
            border: none !important;
        }
        
        .table-light {
            background-color: #f8f9fa;
            border: none;
        }
        
        /* Estilos para estados como texto coloreado en lugar de botones */
        .estado-activo {
            color: #28a745;
            font-weight: 600;
            background-color: transparent !important;
            padding: 0;
        }
        
        .estado-inactivo {
            color: #6c757d;
            font-weight: 600;
            background-color: transparent !important;
            padding: 0;
        }
     </style>
</head>
<body>
  <?php include __DIR__ . '/Nav.php'; ?>

  <div class="container-fluid pt-5" style="background:#f5f7ffff;">
    <div class="row">
  <aside class="col-12 col-md-2 p-0 sidebar-fill">
  <?php include __DIR__ . '/Menu.php'; ?>
      </aside>
      <main class="col-12 col-md-10 pt-4">
        <h1 class="h3 mb-4">Cargos</h1>

        <?php
        // Datos de ejemplo (reemplaza por tu consulta a BD)
        $departamentos = [
          ['nombre'=>'Recursos Humanos','codigo'=>'RH-001','responsable'=>'Ana Pérez','empleados'=>12,'descripcion'=>'Gestión del talento humano','estado'=>'Activo'],
          ['nombre'=>'Contabilidad','codigo'=>'CT-002','responsable'=>'Luis Gómez','empleados'=>8,'descripcion'=>'Manejo de finanzas y contabilidad','estado'=>'Activo'],
          ['nombre'=>'IT','codigo'=>'IT-003','responsable'=>'María Ruiz','empleados'=>15,'descripcion'=>'Soporte y desarrollo de sistemas','estado'=>'Activo'],
          ['nombre'=>'Compras','codigo'=>'CP-004','responsable'=>'Jorge Díaz','empleados'=>5,'descripcion'=>'Adquisición de bienes y servicios','estado'=>'Inactivo'],
        ];

        // Cargos por departamento (ejemplo). En tu BD, consulta por el código del departamento
        $cargosPorDep = [
          'RH-001' => [
            ['cargo'=>'Analista de RRHH','codigo'=>'RH-C01','responsable'=>'Ana Pérez','vacantes'=>1,'descripcion'=>'Reclutamiento y selección','estado'=>'Activo'],
            ['cargo'=>'Coordinador de RRHH','codigo'=>'RH-C02','responsable'=>'Ana Pérez','vacantes'=>0,'descripcion'=>'Coordinación de procesos','estado'=>'Inactivo'],
          ],
          'CT-002' => [
            ['cargo'=>'Contador General','codigo'=>'CT-C01','responsable'=>'Luis Gómez','vacantes'=>1,'descripcion'=>'Estados financieros','estado'=>'Activo'],
            ['cargo'=>'Auxiliar Contable','codigo'=>'CT-C02','responsable'=>'Luis Gómez','vacantes'=>2,'descripcion'=>'Registro contable','estado'=>'Activo'],
          ],
          'IT-003' => [
            ['cargo'=>'Desarrollador Backend','codigo'=>'IT-C01','responsable'=>'María Ruiz','vacantes'=>1,'descripcion'=>'APIs y servicios','estado'=>'Activo'],
            ['cargo'=>'Soporte Técnico','codigo'=>'IT-C02','responsable'=>'María Ruiz','vacantes'=>0,'descripcion'=>'Mesa de ayuda','estado'=>'Inactivo'],
          ],
          'CP-004' => [
            ['cargo'=>'Comprador','codigo'=>'CP-C01','responsable'=>'Jorge Díaz','vacantes'=>1,'descripcion'=>'Gestión de compras','estado'=>'Activo'],
          ],
        ];

        // Departamento seleccionado por GET (?dep=CODIGO), por defecto el primero activo
        $depSeleccionado = isset($_GET['dep']) ? $_GET['dep'] : ($departamentos[0]['codigo'] ?? null);
        $cargos = $cargosPorDep[$depSeleccionado] ?? [];

        if (!function_exists('renderEliminarBtn')) {
          function renderEliminarBtn($id) {
            return '<button class="btn btn-sm btn-danger eliminar-dep" type="button" data-id="' . htmlspecialchars($id) . '">
                      <i class="bi bi-trash"></i> Eliminar
                    </button>';
          }
        }
        ?>
 
        <!-- Filtro por Departamento y listado de Cargos -->
        <div class="card mb-4 border-0 shadow-lg">
          <div class="card-header fw-semibold">Cargos por Departamento</div>
          <div class="card-body">
            <form method="GET" action="<?= htmlspecialchars($_SERVER['PHP_SELF'] ?? '') ?>" class="row g-3 align-items-end" id="formFiltroDep">
              <div class="col-md-6">
                <label for="filtroDepartamento" class="form-label">Departamento</label>
                <select id="filtroDepartamento" name="dep" class="form-select">
                  <?php foreach ($departamentos as $dep): ?>
                    <option value="<?= htmlspecialchars($dep['codigo']) ?>" <?= ($depSeleccionado === $dep['codigo']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($dep['nombre']) ?> (<?= htmlspecialchars($dep['codigo']) ?>)
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-funnel"></i> Filtrar</button>
              </div>
              <div class="col-md-3 text-md-end">
                <button type="button" id="btnAgregarCargo" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalAgregarCargo">
                  <i class="bi bi-briefcase"></i> Agregar Cargo
                </button>
              </div>
            </form>

            <div class="table-responsive mt-4">
              <table class="table table-hover table-borderless mb-0 align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Cargo</th>
                    <th>Código</th>
                    <th>Responsable</th>
                    <th>Vacantes</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th class="text-center" style="width: 120px;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($cargos)): ?>
                    <tr>
                      <td colspan="7" class="text-center text-muted">No hay cargos para el departamento seleccionado.</td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($cargos as $c): ?>
                      <tr>
                        <td><?= htmlspecialchars($c['cargo']) ?></td>
                        <td><?= htmlspecialchars($c['codigo']) ?></td>
                        <td><?= htmlspecialchars($c['responsable']) ?></td>
                        <td><?= (int)$c['vacantes'] ?></td>
                        <td><?= htmlspecialchars($c['descripcion']) ?></td>
                        <td>
                          <span class="estado-<?= strtolower($c['estado']) ?>"><?= htmlspecialchars($c['estado']) ?></span>
                        </td>
                        <td class="text-center">

                          <?= renderEliminarBtn($c['codigo']) ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div> 
      </main>
    </div>
  </div>
 <?php include __DIR__ . '/Modal/ModalAgregarCargo.php'; ?>

<script>
// Carga Bootstrap bundle solo una vez (si no lo trae Nav.php)
if (!window.bootstrap) {
  const s = document.createElement('script');
  s.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js';
  s.defer = true;
  document.body.appendChild(s);
}

// Limpia backdrop y desbloquea el body al cerrar cualquier modal
document.addEventListener('hidden.bs.modal', function () {
  document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
  document.body.classList.remove('modal-open');
  document.body.style.removeProperty('padding-right');
});

// Auto-submit filtro de departamento al cambiar
document.addEventListener('DOMContentLoaded', function(){
  var sel = document.getElementById('filtroDepartamento');
  var form = document.getElementById('formFiltroDep');
  if (sel && form) {
    sel.addEventListener('change', function(){ form.submit(); });
  }
  // Prefill del departamento en el modal de Agregar Cargo
  document.addEventListener('shown.bs.modal', function (ev) {
    var modal = ev.target;
    if (modal && modal.id === 'modalAgregarCargo') {
      var depSel = document.getElementById('filtroDepartamento');
      var inputDep = modal.querySelector('#departamento');
      if (depSel && inputDep) {
        inputDep.value = depSel.value || '';
      }
    }
  });
});
</script>
   
   
</body>
</html>






