
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Empleados</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <style>
        body {
            background: #f4f4f4;
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 1rem;
        }
        .container {
          
        
            background: #fff;
            padding: 2px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .fieldset-custom {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .btn-personalizado {
            background-color: #ff2646;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 25px;
            padding: 10px 25px;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 300px;
        }
        .btn-personalizado:hover {
            background-color: #ca2339;
        }
        .secciones-botones {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .iti {
            width: 100%;
        }
        .iti input {
            width: 100%;
        }
        @media (max-width: 768px) {
            .container {
                max-width: 100%;
                padding: 10px;
            }
            .fieldset-custom {
                padding: 10px;
            }
            .btn-personalizado {
                max-width: 100%;
                padding: 10px 10px;
            }
        }
        @media (max-width: 576px) {
            .container {
                padding: 5px;
            }
            .fieldset-custom {
                padding: 5px;
            }
            .btn-personalizado {
                padding: 8px 5px;
            }
        }
    </style>
    <script>
    function mostrarVistaPrevia(event) {
        const input = event.target;
        const preview = document.getElementById('vistaPreviaFoto');
        if (input.files && input.files[0]) {
            preview.src = URL.createObjectURL(input.files[0]);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }
    </script>
      
     
    </style>
</head>
<body>
  <?php include 'Nav.php'; ?>
  
  <div class="container-fluid pt-5">
    <div class="row">
      <aside class="col-12 col-md-2 p-0 vh-100 overflow-auto">
        <?php include 'Menu.php'; ?>
      </aside>
      <main class="col-10 col-md-10 pt-4">
             <form method="POST" action="procesar_nomina.php">
                <!-- Datos del Empleado -->
                <fieldset class="fieldset-custom" id="datos-empleado">
                    <legend class="fw-bold">Datos del Empleado</legend>
                    <div class="row">

                    <!-- Nombre completo -->
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre completo" required>
                    </div>

                    <!-- cedula -->
                    <div class="col-md-6 mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese cédula" maxlength="18" required>
                    </div>

                    <!--direccion --> 
                    <div class="col-md-6 mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese dirección" required>
                    </div>

                    <!-- Telefono --> 
                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control w-100" id="telefono" name="telefono" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required>
                    </div>

                    <!--Cargo o Puesto -->

                    <div class="col-md-6 mb-3">
                        <label for="cargo" class="form-label">Cargo / Puesto</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingrese cargo o puesto" required>
                    </div>

                    <!-- Fecha de ingreso -->
                    <div class="col-md-6 mb-3">
                        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                    </div>

                    <!--Salario basico -->
                    <div class="col-md-6 mb-3">
                        <label for="salario" class="form-label">Salario básico</label>
                        <input type="number" class="form-control" id="salario" name="salario" placeholder="Ingrese salario">
                    </div>

                    <!-- Tipo de contrato -->
                    <div class="col-md-6">
                        <label for="tipo_contrato" class="form-label">Tipo de contrato</label>
                        <select class="form-select" id="tipo_contrato" name="tipo_contrato">
                            <option value="">Seleccione</option>
                            <option value="fijo">Fijo</option>
                            <option value="temporal">Temporal</option>
                            <option value="por_hora">Por hora</option>
                        </select>
                    </div>

                    <!-- Estado civil -->
                    <div class="col-md-6 mb-3">
                        <label for="estado_civil" class="form-label">Estado civil</label>
                        <select class="form-select" id="estado_civil" name="estado_civil">
                            <option value="">Seleccione</option>
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="viudo">Viudo</option>
                            <option value="Unión libre">Unión libre</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                       
                    <!-- Dependientes -->
                    <div class="col-md-6 mb-3">
                        <label for="dependientes" class="form-label">Dependientes</label>
                        <input type="number" class="form-control" id="dependientes" name="dependientes" min="0">
                    </div>

                    <!--Bancos-->
                    <div class="col-md-6 mb-3">
                        <label for="banco" class="form-label">Banco</label>
                        <select class="form-select" id="banco" name="banco">
                            <option value="">Seleccione</option>
                            <option value="Banco Central de la República Dominicana">Banco Central de la República Dominicana</option>
                            <option value="Banreservas">Banreservas</option>
                            <option value="Banco Popular">Banco Popular</option>
                            <option value="Banco BHD León">Banco BHD León</option>
                            <option value="Banco del Progreso">Banco del Progreso</option>
                            <option value="Banco Vimenca">Banco Vimenca</option>
                            <option value="APAP">APAP (Asociación Popular de Ahorros y Préstamos)</option>
                            <option value="Scotiabank República Dominicana">Scotiabank República Dominicana</option>
                            <option value="Banco Santa Cruz">Banco Santa Cruz</option>
                            <option value="Citibank República Dominicana">Citibank República Dominicana</option>
                            <option value="Banco López de Haro">Banco López de Haro</option>
                            <option value="Banesco">Banesco</option>
                            <option value="Asociación Cibao de Ahorros y Préstamos">Asociación Cibao de Ahorros y Préstamos</option>
                            <option value="Asociación La Nacional de Ahorros y Préstamos">Asociación La Nacional de Ahorros y Préstamos</option>
                            <option value="BDI">BDI (Banco de Desarrollo Industrial)</option>
                            <option value="Banco Promerica">Banco Promerica</option>
                            <option value="Bancamérica">Bancamérica</option>
                            <option value="Banco Atlántico">Banco Atlántico</option>
                            <option value="Bancotuí">Bancotuí</option>
                            <option value="Banco BDA">Banco BDA</option>
                            <option value="ADOPEM">ADOPEM</option>
                            <option value="Banco Agrícola de la República Dominicana">Banco Agrícola de la República Dominicana</option>
                            <option value="Banco Ademi">Banco Ademi</option>
                            <option value="Confisa">Confisa</option>
                            <option value="Idecosa Desarrollo">Idecosa Desarrollo</option>
                            <option value="Banco Empire">Banco Empire</option>
                            <option value="Banco Motor Crédito">Banco Motor Crédito</option>
                            <option value="Banco Río">Banco Río</option>
                            <option value="Banco Providencial">Banco Providencial</option>
                            <option value="Banco de Tierras">Banco de Tierras</option>
                            <option value="Gruficorp">Gruficorp</option>
                            <option value="Cofaci">Cofaci</option>
                            <option value="Atlas">Atlas</option>
                            <option value="Bonanza">Bonanza</option>
                            <option value="Bellbank">Bellbank</option>
                            <option value="Fihogar">Fihogar</option>
                            <option value="Micro Banco">Micro Banco</option>
                            <option value="Banco Unión">Banco Unión</option>
                        </select>
                    </div>

                  
                   

                    <!-- Foto del empleado -->
                    <div class="col-md-6 mb-3">
                            <label for="foto" class="form-label">Foto del empleado</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(event)">
                            <small class="form-text text-muted">Seleccione una foto desde los archivos de su dispositivo.</small>
                            <div class="mt-2">
                                <img id="vistaPreviaFoto" src="#" alt="Vista previa de la foto 4x4" style="display:none; width: 120px; height: 120px; object-fit: cover; border: 1px solid #ccc; border-radius: 8px;" />
                            </div>
                    </div>
    
                </div>
            </fieldset>

            <!-- Botón para agregar los Datos Laborales -->
            <div class="text-center mb-4">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#datosLaboralesCollapse" id="mostrarLaborales">
                   <i class="bi bi-plus-square"></i> Agregar Datos Laborales
                </button>
            </div>

            <!-- Datos Laborales (ocultos al inicio) -->
            <div class="collapse" id="datosLaboralesCollapse">
                <fieldset class="fieldset-custom" id="datos-laborales">
                    <legend class="fw-bold">Datos Laborales</legend>
                    <div class="row">

                    <!--Horas Trabajadas-->
                        <div class="col-md-6 mb-3">
                            <label for="horas_trabajadas" class="form-label">Horas trabajadas</label>
                            <input type="text" class="form-control" id="horas_trabajadas" name="horas_trabajadas" placeholder="Ej: 160 normales, 10 extras">
                        </div>

                        <!--Dias Trabajadores-->
                        <div class="col-md-6 mb-3">
                            <label for="dias_trabajados" class="form-label">Días trabajados</label>
                            <input type="number" class="form-control" id="dias_trabajados" name="dias_trabajados" min="0">
                        </div>

                        <!--Dias de ausencias-->
                        <div class="col-md-6 mb-3">
                            <label for="dias_ausencia" class="form-label">Días de ausencia</label>
                            <input type="text" class="form-control" id="dias_ausencia" name="dias_ausencia" placeholder="Ej: 2 justificadas, 1 no justificada">
                        </div> 

                    </div>
                </fieldset>
            </div>

            <!-- Botón final -->
            <div class="text-center mt-4">
                <button type="submit" class="btn-personalizado">
                    <i class="bi bi-person-add"></i> Agregar
                </button>
            </div>
        </form>
    </div>
                 
      </main>
    </div>
  </div>

  
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scroll suave al abrir Datos Laborales -->
    <script>
        document.getElementById('mostrarLaborales').addEventListener('click', function () {
            setTimeout(() => {
                document.getElementById('datos-laborales').scrollIntoView({ behavior: 'smooth' });
            }, 300); // espera a que se abra el collapse
        });
    </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <script>
    const input = document.querySelector("#telefono");
    const iti = window.intlTelInput(input, {
        initialCountry: "do", // República Dominicana por defecto
        preferredCountries: ["do", "us", "es", "mx", "co"], // Países preferidos
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Opcional: para enviar el número completo en formato internacional al backend PHP
    document.querySelector("form").addEventListener("submit", function() {
        const numeroCompleto = iti.getNumber(); 
        input.value = numeroCompleto;
    });
  </script>

</body>
</html>






