<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liquidaciones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-4">
    <!-- Título -->
    <div class="mb-4">
      <h3 class="fw-bold">Liquidaciones</h3>
      <p class="text-muted">Gestión de liquidaciones de colaboradores.</p>
    </div>

    <!-- Filtros -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h5 class="card-title mb-3">Filtros</h5>
        <form class="row g-3">
          <div class="col-md-4">
            <label for="colaborador" class="form-label">Colaborador</label>
            <select class="form-select" id="colaborador">
              <option selected>Seleccione...</option>
              <option>Juan Pérez</option>
              <option>María López</option>
              <option>Carlos Gómez</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="periodo" class="form-label">Período</label>
            <input type="month" class="form-control" id="periodo">
          </div>
          <div class="col-md-4">
            <label for="tipoLiquidacion" class="form-label">Tipo de Liquidación</label>
            <select class="form-select" id="tipoLiquidacion">
              <option selected>Seleccione...</option>
              <option>Vacaciones</option>
              <option>Prestaciones</option>
              <option>Despido</option>
            </select>
          </div>
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Formulario de Liquidaciones -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title mb-3">Detalles de Liquidación</h5>
        <form class="row g-3">
          <div class="col-md-6">
            <label for="concepto" class="form-label">Concepto</label>
            <input type="text" class="form-control" id="concepto" placeholder="Ej. Pago de vacaciones no disfrutadas">
          </div>
          <div class="col-md-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" class="form-control" id="monto" placeholder="0.00">
          </div>
          <div class="col-md-3">
            <label for="fechaPago" class="form-label">Fecha de Pago</label>
            <input type="date" class="form-control" id="fechaPago">
          </div>
          <div class="col-md-12">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" rows="3" placeholder="Notas adicionales..."></textarea>
          </div>
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-success">Guardar Liquidación</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>