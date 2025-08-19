<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="assets/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Inicio</title>
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
        <section class="row g-4 mb-5">
          <div class="col-12 col-sm-6 col-xl-3">
            <?php include 'Componentes/CardNomina.php'; ?>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <?php include 'Componentes/CardEmpleados.php'; ?>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <?php include 'Componentes/CardHorasExtras.php'; ?>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <?php include 'Componentes/CardProximosPagos.php'; ?>
          </div>
        </section>

        <!-- Fila 2: Gráfica Nómina + Últimos pagos -->
        <section class="row g-4 mb-4">
          <div class="col-12 col-lg-8">
            <?php include 'GraficasComponentes/GraficaNomina.php'; ?>
          </div>
          <div class="col-12 col-lg-4">
            <?php include 'Componentes/CardUltimoPagoUsuario.php'; ?>
          </div>
        </section>

        <!-- Fila 3: Costos + Barras + Próximo pago -->
        <section class="row g-4 mb-4">
          <div class="col-12 col-lg-4">
            <?php include 'GraficasComponentes/GraficaCostos.php'; ?>
          </div>
          <div class="col-12 col-lg-4">
            <?php include 'GraficasComponentes/GraficaBarra.php'; ?>
          </div>
          <div class="col-12 col-lg-4">
            <?php include 'Componentes/CardProximoPagoUsuario.php'; ?>
          </div>
        </section>

      </main>
    </div>
  </div>
</body>
</html>
