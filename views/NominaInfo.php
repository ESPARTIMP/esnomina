<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Nóminas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Estilos específicos de NominaInfo extraídos a archivo -->
  <link rel="stylesheet" href="/Esnomina/assets/css/nomina-info.css">
</head>
<body class="page-nomina-info">
  <!-- Barra superior -->
  <?php include __DIR__ . '/Nav.php'; ?>

  <div class="container-fluid pt-5">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-12 col-md-2 sidebar-fill">
        <?php include __DIR__ . '/Menu.php'; ?>
      </aside>

      <!-- Contenido principal -->
      <main class="col-12 col-md-10 pt-4">
        <h1 class="h3 mb-4">Información de Nómina</h1>

        <div class="card card-custom border-0  shadow-lg">
          <div class="card-body p-4">
            <h5 class="mb-2">Detalles De La Nómina</h5>
            <p class="text-muted mb-4">Aquí puedes ver la información completa de la nómina seleccionada.</p>

            <!-- Datos de nómina -->
            <div class="row mb-3">
              <div class="col-md-2"><strong>Código</strong><br> NOM 001</div>
              <div class="col-md-3"><strong>Nombre</strong><br> Nómina Quincena Abril</div>
              <div class="col-md-3"><strong>Periodo</strong><br> 01/04/2025 - 15/04/2025</div>
              <div class="col-md-2"><strong>Fecha De Pago</strong><br> 16/04/2025</div>
            </div>
            <div class="row mb-4">
              <div class="col-md-2"><strong>Tipo</strong><br> Quincenal</div>
              <div class="col-md-3"><strong>Estado</strong><br> <span class="badge-status">En Revisión</span></div>
            </div>

            <!-- Título + Seleccionar Todos (arriba a la derecha, como en la imagen) -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="mb-0">Empleados en la nómina</h6>
              <label class="select-all-top" for="selectAllTop">
                <input class="form-check-input" type="checkbox" id="selectAllTop">
                Seleccionar Todos
              </label>
            </div>

            <!-- Tabla de empleados -->
            <div class="table-responsive">
              <table class="table table-borderless align-middle">
                <caption class="visually-hidden">Lista de empleados en la nómina</caption>
                <thead>
                  <tr>
                    <th class="checkbox-cell" scope="col" aria-label="Seleccionar fila"></th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Sueldo Base</th>
                    <th scope="col">Ingresos</th>
                    <th scope="col">Descuentos</th>
                    <th scope="col">Neto</th>
                  </tr>
                </thead>
                <tbody id="tablaEmpleados">
                  <tr>
                    <td class="checkbox-cell">
                      <input class="form-check-input row-check" type="checkbox" data-id="1" aria-label="Seleccionar Juan Pérez">
                    </td>
                    <td class="text-start">Juan Pérez</td>
                    <td>Ventas</td>
                    <td>$30,000</td>
                    <td>$2,000</td>
                    <td>$1,000</td>
                    <td>$31,000</td>
                  </tr>
                  <tr>
                    <td class="checkbox-cell">
                      <input class="form-check-input row-check" type="checkbox" data-id="2" aria-label="Seleccionar María Gómez">
                    </td>
                    <td class="text-start">María Gómez</td>
                    <td>IT</td>
                    <td>$40,000</td>
                    <td>$3,000</td>
                    <td>$2,000</td>
                    <td>$41,000</td>
                  </tr>
                  <tr>
                    <td class="checkbox-cell">
                      <input class="form-check-input row-check" type="checkbox" data-id="3" aria-label="Seleccionar Pedro Díaz">
                    </td>
                    <td class="text-start">Pedro Díaz</td>
                    <td>Administración</td>
                    <td>$25,000</td>
                    <td>$1,500</td>
                    <td>$500</td>
                    <td>$26,000</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Totales -->
            <div class="resumen-box">
              <div class="resumen-item">
                <span>Total Empleados</span>
                <strong>3</strong>
              </div>
              <div class="resumen-item">
                <span>Total Descuentos</span>
                <strong>$3,500</strong>
              </div>
              <div class="resumen-item">
                <span>Neto a Pagar</span>
                <strong>$98,000</strong>
              </div>
            </div>
          </div>
        </div>

        <!-- Botones -->
        <div class="d-flex justify-content-end gap-1 mt-0">
          <a href="/Esnomina/index.php?page=nominas" class="btn btn-regresar">Regresar</a>
          <button class="btn-conceptos">Conceptos</button>
        </div>
      </main>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Lógica de selección -->
  <script>
    // Lógica de selección de filas: aislada y cargada tras el DOM
    document.addEventListener('DOMContentLoaded', function () {
      const selectAllTop = document.getElementById('selectAllTop');
      const rowChecks = Array.from(document.querySelectorAll('.row-check'));

      function toggleRowHighlight(tr, checked) {
        if (!tr) return;
        tr.classList.toggle('table-active', checked);
      }

      if (selectAllTop) {
        selectAllTop.addEventListener('change', (e) => {
          const checked = e.target.checked;
          rowChecks.forEach(chk => {
            chk.checked = checked;
            toggleRowHighlight(chk.closest('tr'), checked);
          });
        });
      }

      rowChecks.forEach(chk => {
        chk.addEventListener('change', (e) => {
          const tr = e.target.closest('tr');
          toggleRowHighlight(tr, e.target.checked);
          const allChecked = rowChecks.every(c => c.checked);
          const noneChecked = rowChecks.every(c => !c.checked);
          // Estado indeterminado cuando hay mezcla
          if (selectAllTop) {
            selectAllTop.indeterminate = !allChecked && !noneChecked;
            selectAllTop.checked = allChecked;
          }
        });
      });
    });
  </script>
</body>
</html>
