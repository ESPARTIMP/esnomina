<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Inicio</title>
  <link rel="stylesheet" href="/Esnomina/assets/css/styles.css">
  <link rel="stylesheet" href="/Esnomina/assets/css/index.css">
  <link rel="stylesheet" href="/Esnomina/assets/css/nominas.css">

  <!-- Estilos de componentes -->
  <link rel="stylesheet" href="/Esnomina/assets/css/card-ultimos-pagos.css">
  <link rel="stylesheet" href="/Esnomina/assets/css/card-proximo-pago.css">
  
</head>
<body>
  <!-- Barra superior -->
  <?php include 'Nav.php'; ?>

  <div class="container-fluid pt-5" style="background-color: #f5f7ff;">
    <div class="row">
      
      <!-- Sidebar -->
      <aside class="col-12 col-md-2 p-0 sidebar-fill">
        <?php include 'Menu.php'; ?>
      </aside>

      <!-- Contenido principal -->
      <main class="col-12 col-md-10 pt-4">

        <!-- Fila 1: Cards resumen -->
        <section class="row g-4">
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-fixed-height">
              <?php include 'Componentes/CardNomina.php'; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-fixed-height">
              <?php include 'Componentes/CardEmpleados.php'; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-fixed-height">
              <?php include 'Componentes/CardHorasExtras.php'; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-fixed-height">
              <?php include 'Componentes/CardProximosPagos.php'; ?>
            </div>
          </div>
        </section>

        <!-- Fila 2: Gráfica Nómina + Últimos pagos -->
        <section class="row g-4 mb-4">
          <div class="col-12 col-lg-6">
            <div class="chart-card-fixed-height">
              <?php include 'GraficasComponentes/GraficaNomina.php'; ?>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="user-payment-card-fixed-height">
              <?php include 'Componentes/CardUltimoPagoUsuario.php'; ?>
            </div>
          </div>
        </section>

        <!-- Fila 3: Costos + Barras + Próximo pago -->
        <section class="row g-4 mb-4">
          <div class="col-12 col-sm-3 col-lg-3">
            <div class="chart-card-fixed-height">
              <?php include 'GraficasComponentes/GraficaCostos.php'; ?>
            </div>
          </div>
          <div class="col-12 col-sm-3 col-lg-3">
            <div class="chart-card-fixed-height">
              <?php include 'GraficasComponentes/GraficaBarra.php'; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-6">
            <div class="user-payment-card-fixed-height">
              <?php include 'Componentes/CardProximoPagoUsuario.php'; ?>
            </div>
          </div>
        </section>

      </main>
    </div>
  </div>
</body>
</html>
<!-- Cargar librerías de gráficos una sola vez y de forma diferida -->
<script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js" defer></script>
