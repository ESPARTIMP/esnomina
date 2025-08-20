<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aportes e Impuestos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-dark text-white">
        <h4 class="mb-0">Aportes e Impuestos</h4>
      </div>
      <div class="card-body">
        <!-- Filtros -->
        <form class="row g-3 mb-4">
          <div class="col-md-4">
            <label class="form-label">Periodo</label>
            <input type="month" class="form-control">
          </div>
          <div class="col-md-4">
            <label class="form-label">Tipo de aporte / impuesto</label>
            <select class="form-select">
              <option selected>Todos</option>
              <option>AFP</option>
              <option>ARS</option>
              <option>INFOTEP</option>
              <option>ISR</option>
            </select>
          </div>
          <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
          </div>
        </form>

        <!-- Tabla -->
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th>Empleado</th>
                <th>AFP</th>
                <th>ARS</th>
                <th>INFOTEP</th>
                <th>ISR</th>
                <th>Total Aportes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Juan Pérez</td>
                <td>1,200</td>
                <td>800</td>
                <td>350</td>
                <td>1,000</td>
                <td>3,350</td>
              </tr>
              <tr>
                <td>Ana Gómez</td>
                <td>1,100</td>
                <td>750</td>
                <td>340</td>
                <td>900</td>
                <td>3,090</td>
              </tr>
            </tbody>
            <tfoot class="table-secondary">
              <tr>
                <th>Total General</th>
                <th>2,300</th>
                <th>1,550</th>
                <th>690</th>
                <th>1,900</th>
                <th>6,440</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>