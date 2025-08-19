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
      
     
    </style>
</head>
<body>
  <?php include __DIR__ . '/Nav.php'; ?>

  <div class="container-fluid pt-5" style="background:#f5f7ffff;">
    <div class="row">
      <aside class="col-12 col-md-2 p-0 vh-100 overflow-auto">
  <?php include __DIR__ . '/Menu.php'; ?>
      </aside>
      <main class="col-12 col-md-10 pt-4">
        <h1 class="h3 mb-4">Cargos y Departamentos</h1>

        <?php
        // Datos de ejemplo (reemplaza por tu consulta a BD)
        $departamentos = [
          ['nombre'=>'Recursos Humanos','codigo'=>'RH-001','responsable'=>'Ana Pérez','empleados'=>12,'descripcion'=>'Gestión del talento humano','estado'=>'Activo'],
          ['nombre'=>'Contabilidad','codigo'=>'CT-002','responsable'=>'Luis Gómez','empleados'=>8,'descripcion'=>'Manejo de finanzas y contabilidad','estado'=>'Activo'],
          ['nombre'=>'IT','codigo'=>'IT-003','responsable'=>'María Ruiz','empleados'=>15,'descripcion'=>'Soporte y desarrollo de sistemas','estado'=>'Activo'],
          ['nombre'=>'Compras','codigo'=>'CP-004','responsable'=>'Jorge Díaz','empleados'=>5,'descripcion'=>'Adquisición de bienes y servicios','estado'=>'Inactivo'],
        ];

        if (!function_exists('renderEliminarBtn')) {
          function renderEliminarBtn($id) {
            return '<button class="btn btn-sm btn-danger eliminar-dep" type="button" data-id="' . htmlspecialchars($id) . '">
                      <i class="bi bi-trash"></i> Eliminar
                    </button>';
          }
        }
        ?>
 
  <div class="card mb-4 border-0 shadow-lg">
              <div class="row d-flex  mb-4 justify-content-end ">
                <div class="col-3  ">
                     <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalAgregarDepartamento">
                         <i class="bi bi-building-add"></i> Agregar Departamento
                     </button>        
                     
                </div>
            </div>
          <div class="card-header fw-semibold">Listado de Departamentos</div>
          <div class="card-body  p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Responsable</th>
                    <th>Empleados</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th class="text-center" style="width: 120px;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($departamentos as $dep): ?>
                    <tr>
                      <td><?= htmlspecialchars($dep['nombre']) ?></td>
                      <td><?= htmlspecialchars($dep['codigo']) ?></td>
                      <td><?= htmlspecialchars($dep['responsable']) ?></td>
                      <td><?= (int)$dep['empleados'] ?></td>
                      <td><?= htmlspecialchars($dep['descripcion']) ?></td>
                      <td>
                        <span class="badge <?= $dep['estado']==='Activo' ? 'bg-success' : 'bg-secondary' ?>">
                          <?= htmlspecialchars($dep['estado']) ?>
                        </span>
                      </td>
                      <td class="text-center">
                        <?= renderEliminarBtn($dep['codigo']) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-muted small">
            Total: <?= count($departamentos) ?> departamentos
          </div>
        </div>
        </form>
    </div>
                 
      </main>
    </div>
  </div>
 <?php include __DIR__ . '/Modal/ModalAgregar.php'; ?>

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
</script>
   
   
</body>
</html>






