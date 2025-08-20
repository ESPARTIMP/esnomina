<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte - Percepciones y Deducciones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

  <div class="container">
    <!-- Título -->
    <h3 class="mb-4">Reporte de Percepciones y Deducciones</h3>

    <!-- Filtros -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <form class="row g-3">
          
          <!-- Empleado -->
          <div class="col-md-4">
            <label for="empleado" class="form-label">Empleado</label>
            <input type="text" class="form-control" id="empleado" placeholder="Nombre o ID">
          </div>

          <!-- Departamento -->
          <div class="col-md-4">
            <label for="departamento" class="form-label">Departamento</label>
            <select id="departamento" class="form-select">
              <option selected>Seleccione...</option>
              <option>Administración</option>
              <option>Contabilidad</option>
              <option>Recursos Humanos</option>
              <option>Operaciones</option>
            </select>
          </div>

          <!-- Periodo -->
          <div class="col-md-4">
            <label for="periodo" class="form-label">Periodo</label>
            <select id="periodo" class="form-select">
              <option selected>Seleccione...</option>
              <option>Semanal</option>
              <option>Quincenal</option>
              <option>Mensual</option>
            </select>
          </div>

          <!-- Fecha inicio -->
          <div class="col-md-3">
            <label for="fechaInicio" class="form-label">Desde</label>
            <input type="date" class="form-control" id="fechaInicio">
          </div>

          <!-- Fecha fin -->
          <div class="col-md-3">
            <label for="fechaFin" class="form-label">Hasta</label>
            <input type="date" class="form-control" id="fechaFin">
          </div>

          <!-- Botones -->
          <div class="col-12 d-flex justify-content-end mt-3">
            <button type="reset" class="btn btn-outline-secondary me-2">Limpiar</button>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Resultados -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="mb-3">Resultados</h5>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th>ID Empleado</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Percepciones</th>
                <th>Deducciones</th>
                <th>Neto a Pagar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>001</td>
                <td>Juan Pérez</td>
                <td>Contabilidad</td>
                <td>50,000</td>
                <td>5,000</td>
                <td>45,000</td>
              </tr>
              <tr>
                <td>002</td>
                <td>María Gómez</td>
                <td>Administración</td>
                <td>60,000</td>
                <td>6,500</td>
                <td>53,500</td>
              </tr>
              <!-- Más filas dinámicas -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
