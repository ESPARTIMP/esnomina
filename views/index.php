<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="/Esnomina/assets/css/styles.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Inicio</title>
  <style>
    /* Estilos para mantener un tamaño consistente en los cards */
    .card-fixed-height {
      min-height: 180px; /* Altura mínima para los cards de resumen */
      max-height: 190px; /* Altura máxima para evitar que se estiren demasiado */
    }
    
    .chart-card-fixed-height {
      min-height: 400px; /* Altura mínima para los cards con gráficas */
      max-height: 420px; /* Altura máxima para evitar que se estiren demasiado */
    }
    
    .user-payment-card-fixed-height {
      min-height: 400px; /* Altura mínima para los cards de pagos de usuario */
      max-height: 400px; /* Altura máxima para evitar que se estiren demasiado */
    }
  </style>
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
          <div class="col-12 col-lg-8">
            <div class="chart-card-fixed-height">
              <?php include 'GraficasComponentes/GraficaNomina.php'; ?>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="user-payment-card-fixed-height">
              <?php include 'Componentes/CardUltimoPagoUsuario.php'; ?>
            </div>
          </div>
        </section>

        <!-- Fila 3: Costos + Barras + Próximo pago -->
        <section class="row g-4 mb-4">
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="chart-card-fixed-height">
              <?php include 'GraficasComponentes/GraficaCostos.php'; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="chart-card-fixed-height">
              <?php include 'GraficasComponentes/GraficaBarra.php'; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
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
