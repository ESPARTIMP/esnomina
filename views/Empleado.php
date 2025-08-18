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
  <?php include 'Nav.php'; ?>
  
  <div class="container-fluid pt-5">
    <div class="row">
      <aside class="col-12 col-md-2 p-0 vh-100 overflow-auto">
        <?php include 'Menu.php'; ?>
      </aside>
      <main class="col-12 col-md-10 pt-4">
        <h1 class="h3 mb-4">Empleado</h1>

        <?php
        // Datos de ejemplo de empleados (solo: nombre, cédula, código, estado)
        $empleado = [
          ['nombre'=>'Juan Pérez','cedula'=>'001-1234567-8','codigo'=>'EMP-001','estado'=>'Activo'],
          ['nombre'=>'María Gómez','cedula'=>'002-7654321-9','codigo'=>'EMP-002','estado'=>'Activo'],
          ['nombre'=>'Luis Díaz','cedula'=>'003-1122334-5','codigo'=>'EMP-003','estado'=>'Activo'],
          ['nombre'=>'Ana Ruiz','cedula'=>'004-9988776-5','codigo'=>'EMP-004','estado'=>'Inactivo'],
        ];

        if (!function_exists('renderEliminarBtn')) {
          function renderEliminarBtn($id) {
            return '<button class="btn btn-sm btn-danger eliminar-dep" type="button" data-id="' . htmlspecialchars($id) . '">
                      <i class="bi bi-trash"></i> Eliminar
                    </button>';
          }
        }
        ?>
       
        <div class="card mb-4 border-0">
          <div class="row d-flex mb-4 justify-content-end">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-end">
              <a href="/Esnomina/views/CrearEmpleado.php" class="btn btn-primary w-100">
                <i class="bi bi-person-plus"></i> Agregar Empleado
              </a>
            </div>
          </div>

          <div class="card-header fw-semibold">Listado de Empleados</div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover mb-0 align-middle">
                <!-- Encabezados de la tabla -->
                <thead class="table-light">
                  <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Código</th>
                    <th>Estado</th>
                    <th class="text-center" style="width: 140px;">Acciones</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($empleado as $emp): ?>
                    <tr>
                      <td><?= htmlspecialchars($emp['nombre']) ?></td>
                      <td><?= htmlspecialchars($emp['cedula']) ?></td>
                      <td><?= htmlspecialchars($emp['codigo']) ?></td>
                      <td>
                        <span class="badge <?= $emp['estado']==='Activo' ? 'bg-success' : 'bg-secondary' ?>">
                          <?= htmlspecialchars($emp['estado']) ?>
                        </span>
                      </td>
                      <td class="text-center">
                        <?= renderEliminarBtn($emp['codigo']) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-muted small">
            Total: <?= count($empleado) ?> empleados
          </div>
        </div>
        </form>
    </div>
                 
      </main>
    </div>
  </div>

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






