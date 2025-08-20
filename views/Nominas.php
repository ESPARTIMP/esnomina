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
    <style>



        .estado-revision {
            background-color: #fff3cdff;
            color: #f0b70eff;
        }
        .estado-confirmada {
            background-color: #d4edda;
            color: #155724;
        }
        .estado-pendiente {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        .badge-estado {
            padding: 0.6em 0.9em;
            border-radius: 0.25rem;
            font-weight: 500;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.1);
        }
        
        /* Remove borders from tables */
        .table {
            border: none !important;
        }
       
        
        .table th,
        .table td {
            border: none !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
            
        }

      
        
        .table thead th {
          
          background-color: #f5f7ff ;
          border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
        }
        
        /* Remove borders from cards */
        .card {
            border: none !important;
            border-radius: 8px !important;
        }
        
        .card-header {
            background-color: transparent !important;
            border-bottom: none !important;
            padding-bottom: 0 !important;
        }
        
        .card-footer {
            background-color: transparent !important;
            border-top: none !important;
        }
        
        /* Remove borders from pagination */
        .page-link {
            border: none !important;
            margin-left: 2px;
            margin-right: 2px;
            border-radius: 4px !important;
        }
        
        .page-item.active .page-link {
            background-color: #1d004dff;
        }

        .boton-personalizado {
            background-color: #1d004dff;
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5em 1em;
            font-size: 1em;
            cursor: pointer;
           
        }

        .boton-personalizado:hover {
            background-color: #0056b3;
        }
        
        /* Adjust for fixed navbar */
        body {
            padding-top: 0; /* Remove default padding */
        }
        
        /* Style for the sidebar to handle the fixed nav */
        .sidebar-fill {
            position: relative;
            z-index: 10;
        }

        .input-modificacion{
          background-color: #000000ff;
        }
        
        /* Style all form inputs with the requested background color */
        .form-control, 
        .form-select {
          background-color: #f5f7ff !important;
          border: 1px solid #dee2e6;
        }
        
        .form-control:focus, 
        .form-select:focus {
          background-color: #f5f7ff !important;
          border-color: #1d004dff;
          box-shadow: 0 0 0 0.25rem rgba(29, 0, 77, 0.25);
        }
        .boton-crear-nomina{
            margin-left:0.3%;
            margin-top:0.3%;
            background: #FFA9DD;
            border: none;
            color: white;
            padding: 12px 25px;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
            transition: all 0.3s ease;

        }

        .boton-finalizar{
            margin-left:0.3%;
            margin-top:0.3%;
            background: #B0f0A5;
            border: none;
            color: white;
            padding: 12px 25px;
            border-bottom-right-radius: 50px; 
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
            transition: all 0.3s ease;

          
        }

        .boton-calcular{
            margin-left:0.3%;
            margin-top:0.3%;
            background: #FFA9DD;
            border: none;
            color: white;
            padding: 12px 25px;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
            transition: all 0.3s ease;


        }

        .boton-guardar-borrador{
            margin-left:0.3%;
            margin-top:0.3%;
            background: #0E0C35;
            border: none;
            color: white;
            padding: 12px 25px;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
            transition: all 0.3s ease;


        }

        .boton-finalizar,
        .boton-calcular,
        .boton-guardar-borrador,
        .boton-crear-nomina {
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
      
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
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
            <button class="boton-crear-nomina">
               + Crear Nómina
            </button>
        </div>

        <!-- Filtros y búsqueda -->
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row d-flex">
                    <div class="col-md-3">
                      <label>Descripción de nómina</label>
                       <input type="text" class="form-control" placeholder="Ingrese la descripción de nómina">
                    </div>
                    <div class="col-md-3">
                        <label>Periodo</label>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="date" class="form-control" placeholder="Ingrese el periodo de nómina">
                          </div>
                          <div class="col-md-6">
                            <input type="date" class="form-control" placeholder="Ingrese el periodo de nómina">
                          </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                      <label>Fecha de pago</label>
                      <input type="date" class="form-control" placeholder="Ingrese la fecha de pago">
                    </div>

                    <div class="col-md-3">
                     <label>Tipos de nóminas</label>
                     <select class="form-select">
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

        <!-- Listado de Nóminas -->
        <div class="card shadow-lg">
            <div class="card-header">
                <h5 class="mb-0">Listado De Nóminas</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-borderless">
                    <table class="table table-hover mb-0">
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