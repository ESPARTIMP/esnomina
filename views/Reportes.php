<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Esnomina/assets/css/nomina-info.css">
    <link rel="stylesheet" href="/Esnomina/assets/css/card-reporte.css">

</head>
<body>
  <?php include __DIR__ . '/Nav.php'; ?>
  <div class="container-fluid pt-5">
    <div class="row">
  <aside class="col-12 col-md-2 p-0 sidebar-fill">
  <?php include __DIR__ . '/Menu.php'; ?>
      </aside>
      <main class="col-12 col-md-10 pt-4">
       <div class="row">
        
     <div class="col-2">
       <button type="button" class="btn p-0 border-0 bg-transparent w-100 text-start" data-bs-toggle="modal" data-bs-target="#modalLiquidacionesDetalle">
            <div class="card-reporte text-center border-0 shadow-lg summary-card">
              <div class="card-body resumen-card">
                <h6 class="card-title">Percenciones y Deducciones</h6>
              </div>
            </div>
          </button>
       </div>

     <div class="col-2">
       <button type="button" class="btn p-0 border-0 bg-transparent w-100 text-start" data-bs-toggle="modal" data-bs-target="#modalLiquidaciones">
            <div class="card-reporte text-center border-0 shadow-lg summary-card">
              <div class="card-body resumen-card">
                <h6 class="card-title">Liquidaciones</h6>
              </div>
            </div>
          </button>
       </div>


     <div class="col-2">
       <button type="button" class="btn p-0 border-0 bg-transparent w-100 text-start" data-bs-toggle="modal" data-bs-target="#modalAportes">
            <div class="card-reporte text-center border-0 shadow-lg summary-card">
              <div class="card-body resumen-card">
                <h6 class="card-title">Aportes e Impuestos</h6>
              </div>
            </div>
          </button>
       </div>


         <div class="col-2">
          <button type="button" class="btn p-0 border-0 bg-transparent w-100 text-start" data-bs-toggle="modal" data-bs-target="#modalLiquidacionesDetalle">
            <div class="card-reporte text-center  border-0 shadow-lg summary-card">
              <div class="card-body resumen-card">
                <h6 class="card-title"></h6>
              </div>
            </div>
          </button>
       </div>

          <div class="col-2">
          <button type="button" class="btn p-0 border-0 bg-transparent w-100 text-start" data-bs-toggle="modal" data-bs-target="#modalAportes">
            <div class="card-reporte text-center border-0 shadow-lg summary-card">
              <div class="card-body resumen-card">
                <h6 class="card-title"></h6>
              </div>
             </div>
          </button>
         </div>

           <div class="col-2">
            <button type="button" class="btn p-0 border-0 bg-transparent w-100 text-start" data-bs-toggle="modal" data-bs-target="#modalLiquidaciones">
              <div class="card-reporte text-center mb-4 border-0 shadow-lg summary-card">
               <div class="card-body resumen-card">
                <h6 class="card-title"></h6>
              </div>
             </div>
            </button>
       </div>
        
       </div>
    

       </div>
      </main>
    </div>
  </div>
  <!-- Bootstrap JS (requerido para modales) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php include __DIR__ . '/Modal/ModalPercepcionesDeducciones.php'; ?>
  <?php include __DIR__ . '/Modal/ModalAportesImpuesto.php'; ?>
  <?php include __DIR__ . '/Modal/ReporteLiquidacion.php'; ?>
</body>
</html>