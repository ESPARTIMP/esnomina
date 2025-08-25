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
        <h1 class="h3 mb-4">Departamentos</h1>

        <?php
        // Datos de ejemplo (reemplaza por tu consulta a BD)
        // Ahora solo: código, departamento, departamento superior
        $departamentos = [
          ['codigo'=>'RH-001','departamento'=>'Recursos Humanos','departamento_sup'=>'Dirección General'],
          ['codigo'=>'CT-002','departamento'=>'Contabilidad','departamento_sup'=>'Dirección General'],
          ['codigo'=>'IT-003','departamento'=>'Tecnología','departamento_sup'=>'Operaciones'],
          ['codigo'=>'CP-004','departamento'=>'Compras','departamento_sup'=>'Operaciones'],
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
              <div class="row d-flex mb-4 justify-content-end ">
                <div class="col-3">
                     <button type="button" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#modalAgregarDepartamento">
                         <i class="bi bi-building-add"></i> Agregar Departamento
                     </button>        
                     
                </div>
            </div>
          <div class="card-header fw-semibold">Listado de Departamentos</div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover table-borderless mb-0 align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Código</th>
                    <th>Departamento</th>
                    <th>Departamento Superior</th>
                    <th class="text-center" style="width: 120px;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($departamentos as $dep): ?>
                    <tr>
                      <td><?= htmlspecialchars($dep['codigo']) ?></td>
                      <td><?= htmlspecialchars($dep['departamento']) ?></td>
                      <td><?= htmlspecialchars($dep['departamento_sup']) ?></td>
                      <td class="text-center">
                        <?= renderEliminarBtn($dep['codigo']) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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






