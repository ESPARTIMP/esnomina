<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Nóminas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f5fb;
    }
    .card-custom {
      border-radius: 12px;
      background: #fff;
      box-shadow: 0px 2px 8px rgba(0,0,0,0.05);
    }
    .title-section {
      font-size: 20px;
      font-weight: bold;
    }
    .badge-status {
      color: green;
      font-weight: bold;
    }
    .table th {
      background-color: #f8f9fa;
    }
    .total-box {
      background: #f5f7fb;
      border-radius: 10px;
      padding: 10px 15px;
      font-weight: bold;
    }
    .neto {
      font-size: 22px;
      font-weight: bold;
      color: #6c63ff;
    }
    .btn-regresar {
      margin-left: 0.3%;
      margin-top: 0.3%;
      background: #0E0C35;
      border: none;
      color: white;
      box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
      transition: all 0.3s ease;
    }
    .btn-finalizar {
      margin-left: 0.3%;
      margin-top: 0.3%;
      background: #B0f0A5;
      border: none;
      color: white;
      border-bottom-right-radius: 50px; 
      box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
      transition: all 0.3s ease;
    }
    .btn-editar {
      margin-left: 0.2%;
      margin-top: 0.3%;
      background: #FFA9DD;
      border: none;
      color: white;
      box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
      transition: all 0.3s ease;
    }

     .btn-finalizar,
     .btn-editar,
     .btn-regresar{
     /* Reducir padding vertical */
    padding: 3px 22px;
     /* Fuente más pequeña y delgada */
    font-size: 0.9rem;
    font-weight: 500;
    /* Transición más suave */
    transition: all 0.2s ease;
    /* Sombra más sutil */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Texto con mejor contraste */
    letter-spacing: 0.3px;
    }
  </style>
</head>
<body>

<div class="container py-4">
  <div class="card card-custom p-4 shadow-lg">

    <!-- Encabezado -->
    <h5 class="title-section">Detalles De La Nómina</h5>
    <p class="text-muted">Aquí puedes ver la información completa de la nómina seleccionada.</p>

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

    <!-- Tabla de empleados -->
    <h6 class="mb-3">Empleados en la nómina</h6>
    <div class="table-responsive">
      <table class="table table-borderless align-middle text-center">
        <thead>
          <tr>
            <th>Empleado</th>
            <th>Departamento</th>
            <th>Sueldo Base</th>
            <th>Ingresos</th>
            <th>Descuentos</th>
            <th>Neto</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Juan Pérez</td>
            <td>Ventas</td>
            <td>$30,000</td>
            <td>$2,000</td>
            <td>$1,000</td>
            <td>$31,000</td>
          </tr>
          <tr>
            <td>María Gómez</td>
            <td>IT</td>
            <td>$40,000</td>
            <td>$3,000</td>
            <td>$2,000</td>
            <td>$41,000</td>
          </tr>
          <tr>
            <td>Pedro Díaz</td>
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
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="total-box">Total Empleados<br>3</div>
      </div>
      <div class="col-md-6 text-end">
        <div class="neto">Neto a Pagar<br>$98,000</div>
      </div>
    </div>
  
  </div>
    <div class="d-flex justify-content-end gap-2">
      <button class="btn btn-regresar">Regresar</button>
      <button class="btn btn-editar">Editar</button>
      <button class="btn btn-finalizar">Finalizar</button>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
