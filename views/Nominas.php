<?php
// Simulación de datos
$nominas = [
    [
        'codigo' => 'NOM-001',
        'nombre' => 'Nómina Quincena Abril',
        'periodo' => '01/04/2025 - 15/04/2025',
        'fecha_pago' => '16/04/2025',
        'tipo' => 'Quincenal',
        'estado' => 'En Revisión'
    ],
    [
        'codigo' => 'NOM-002',
        'nombre' => 'Nómina Mensual Marzo',
        'periodo' => '01/03/2025 - 31/03/2025',
        'fecha_pago' => '01/04/2025',
        'tipo' => 'Mensual',
        'estado' => 'Confirmada'
    ],
    [
        'codigo' => 'NOM-003',
        'nombre' => 'Nómina Semanal #14',
        'periodo' => '01/04/2025 - 07/04/2025',
        'fecha_pago' => '14/04/2025',
        'tipo' => 'Semanal',
        'estado' => 'Pendiente'
    ],
    [
        'codigo' => 'NOM-004',
        'nombre' => 'Nómina Quincena Marzo',
        'periodo' => '16/03/2025 - 31/03/2025',
        'fecha_pago' => '01/04/2025',
        'tipo' => 'Quincenal',
        'estado' => 'Confirmada'
    ],
    [
        'codigo' => 'NOM-005',
        'nombre' => 'Nómina Mensual Febrero',
        'periodo' => '01/02/2025 - 28/02/2025',
        'fecha_pago' => '05/03/2025',
        'tipo' => 'Mensual',
        'estado' => 'Confirmada'
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Nóminas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Esnomina/assets/css/nominas.css">
</head>
<body>
  <?php include __DIR__ . '/Nav.php'; ?>

  <div class="container-fluid" style="background-color: #f5f7ff; margin-top: 60px;">
    <div class="row">
      <aside class="col-12 col-md-2 p-0 sidebar-fill">
        <?php include __DIR__ . '/Menu.php'; ?>
      </aside>

      <main class="col-12 col-md-10" style="padding: 20px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Gestión de Nóminas</h3>
        </div>
<form action="views/funciones/nomina.php?consulta=agregar_nomina" method = "POST">
        <!-- Filtros y búsqueda -->
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row d-flex">
                <div class="col-md-3">
                      <label>Codigo</label>
                       <input type="text" class="form-control" name = "codigo_nom" placeholder="Ingrese la descripción de nómina">
                    </div>
                    <div class="col-md-3">
                      <label>Descripción de nómina</label>
                       <input type="text" class="form-control" name = "descripcion" placeholder="Ingrese la descripción de nómina">
                    </div>
                    <div class="col-md-3">
                        <label>Periodo</label>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="date" class="form-control" name = "fecha_ini" placeholder="Ingrese el periodo de nómina">
                          </div>
                          <div class="col-md-6">
                            <input type="date" class="form-control" name = "fecha_fin" placeholder="Ingrese el periodo de nómina">
                          </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                      <label>Fecha de pago</label>
                      <input type="date" class="form-control" name = "fecha_pago" placeholder="Ingrese la fecha de pago">
                    </div>

                    <div class="col-md-3">
                     <label>Tipos de nóminas</label>
                     <select class="form-select" name = "tipo_nomina">
                         <option value="">Seleccione un tipo</option>
                         <option value="mensual">Mensual</option>
                         <option value="quincenal">Quincenal</option>
                         <option value="semanal">Semanal</option>
                     </select>
                    </div>
                    
                </div>

                <div class="row mt-3 d-flex justify-content-end">
                    <div class="col-md-3 d-flex justify-content-end">
                        <button class="boton-personalizado" >Confirmar</button>
                    </div>
               </div>
        </div>
        </form>
        <!-- Listado de Nóminas -->
        <div class="card">
            <div class="card-header">

            <div class="d-flex justify-content-between align-items-center mb-3">
                 <h5 class="mb-0">Listado De Nóminas</h5>
                <button class="boton-crear-nomina">
                + Crear Nómina
                </button>
            </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-borderless">
                    <table class="table table-hover mb-0 ">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de Nómina</th>
                                <th>Período</th>
                                <th>Fecha de Pago</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($nominas as $nomina): ?>
                            <tr>
                                <td><?php echo $nomina['codigo']; ?></td>
                                <td><?php echo $nomina['nombre']; ?></td>
                                <td><?php echo $nomina['periodo']; ?></td>
                                <td><?php echo $nomina['fecha_pago']; ?></td>
                                <td><?php echo $nomina['tipo']; ?></td>
                                <td>
                                    <?php
                                    $clase_estado = '';
                                    if ($nomina['estado'] == 'En Revisión') $clase_estado = 'estado-revision';
                                    if ($nomina['estado'] == 'Confirmada') $clase_estado = 'estado-confirmada';
                                    if ($nomina['estado'] == 'Pendiente') $clase_estado = 'estado-pendiente';
                                    ?>
                                    <span class="badge-estado <?php echo $clase_estado; ?>">
                                        <?php echo $nomina['estado']; ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="window.location.href='?page=nominasInfo&id=<?php echo $nomina['codigo']; ?>'">
                                        <i class="bi bi-eye"></i> Ver
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        
      </div>
       <div class="row">
              <div class= "col-12">

                  <button class="boton-finalizar float-end">
                    Finalizar
                 </button>

                 <button class="boton-calcular  float-end">
                   Calcular Nómina
                 </button>

                 <button class="boton-guardar-borrador float-end">
                    Guardar Borrador
                 </button>

              </div>
            </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>