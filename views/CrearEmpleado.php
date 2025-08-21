<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Empleados</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- International Telephone Input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <!-- Estilos personalizados -->
    <style>
        body {
            background: #f4f4f4;
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 1rem;
        }


        .boton-guardar{
            margin-left:0.3%;
            margin-top:0.3%;
            background: #AEF0FF;
            border: none;
            color: white;
            padding: 5px 25px;
            border-bottom-right-radius: 50px; 
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
            transition: all 0.3s ease;
            width: 19%;
        }

      

        .container {
            background: #fff;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .fieldset-custom {
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

         .boton-regresar {
           margin-left: 0.3%;
           margin-top: 0.3%;
           background: #0E0C35;
           border: none;
           color: white;
           box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
           transition: all 0.3s ease;
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
            background-color: rgba(122, 122, 122, 1);
        }


        @media (max-width: 768px) {
            .container { max-width: 100%; padding: 10px; }
            .fieldset-custom { padding: 10px; }
            .btn-personalizado { max-width: 100%; padding: 10px 10px; }
        }

    @media (max-width: 576px) {
            .container { padding: 5px; }
            .fieldset-custom { padding: 5px; }
            .btn-personalizado { padding: 8px 5px; }
        }

    </style>

    <!-- Función para vista previa de la foto -->
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
</head>

<body>
    <!-- Navbar -->

    <div class="container-fluid pt-5" style="background:#f5f7ffff;">
        <div class="row justify-content-center">   
            <!-- Menú lateral -->
          
            <!-- Contenido principal -->
            <main class="col-12 col-md-10 col-lg-11 pt-4 ">
            <form method="POST" action="funciones/empleados.php?consulta=ingresar_empleados" enctype="multipart/form-data">
                    <!-- ======================== Datos Personales ======================== -->
                    <fieldset class="fieldset-custom" id="datos-empleado">
                        <div class="row mb-4">
                            <!-- Información personal -->
                            <div class="col-12 col-lg-7">
                                <div class="card border-0 shadow-lg">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                        <div class="row">

                                            <!--Cédula-->
                                            <div class="col-md-6 mb-3">
                                                <label for="cedula" class="form-label">Cédula</label>
                                                <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Ingrese cédula" required maxlength="14">
                                            </div>

                                            <!-- Fecha Nacimiento -->
                                            <div class="col-md-6 mb-3">
                                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="fecha_na" name="fecha_nac" required>
                                            </div>
                                            <!-- Nombre Completo -->
                                            <div class="col-md-6 mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required>
                                            </div>

                                             <!--Lugar de Nacimiento-->

                                            <div class="col-md-6 mb-3">
                                                <label for="lugar_nacimiento" class="form-label">Lugar de Nacimiento</label>
                                                <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_na" placeholder="Ingrese lugar de nacimiento" required>
                                            </div>

                                            <!--Apellido-->

                                            <div class="col-md-6 mb-3">
                                                <label for="apellido" class="form-label">Apellido</label>
                                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellido" required>
                                            </div>

                                            <!--Residencia-->

                                            <div class="col-md-6 mb-3">
                                                <label for="residencia" class="form-label">Residencia</label>
                                                <input type="text" class="form-control" id="residencia" name="direccion" placeholder="Ingrese residencia" required>
                                            </div>
                                            <!--Sexo-->
                                            <div class="col-md-6 mb-3">
                                                <label for="sexo" class="form-label">Sexo</label>
                                                <select class="form-select" id="sexo" name="sexo" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="femenino">Femenino</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>

                                            <!--Telefono-->

                                            <div class="col-md-6 mb-3">
                                                <label for="telefono" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese teléfono" maxlength="15" required>
                                            </div>
                                              
                                            <!--Email-->
                                            <div class="col-12 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required>
                                            </div>

                                            <br>

                                        </div>

                                    </div>
                                        
                                </div>
                            </div>

                            <!-- Información empresarial -->
                            <div class="col-12 col-lg-5">
                                <div class="card border-0 shadow-lg">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Empresariales</h5>

                                        <!--Fecha de ingreso -->

                                        <div class="col-md-12 mb-3">
                                            <label>Codigo</label>
                                            <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Ingrese código del empleado" required maxlength="50">
                                        </div>

                                        <!-- Fecha de ingreso -->
                                        <div class="col-md-12 mb-3">
                                            <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                                            <input type="date" class="form-control" id="fecha_ing" name="fecha_ing">
                                        </div>

                                  
                                        <!-- Tipo de contrato -->
                                        <div class="col-md-12">
                                            <label for="tipo_contrato" class="form-label">Tipo de contrato</label>
                                            <select class="form-select" id="tipo_contrato" name="tipo_cont">
                                                <option value="">Seleccione</option>
                                                <option value="fijo">Fijo</option>
                                                <option value="temporal">Temporal</option>
                                                <option value="por_hora">Por hora</option>
                                            </select>
                                        </div>

                                        <!-- Departamento -->
                                        <div class="col-md-12 mb-3">
                                            <label for="departamento" class="form-label">Departamento</label>
                                            <select class="form-select" id="departamento" name="departamento">

                                            <!--Ejemplo de dato -->
                                                <option value="">Seleccione</option>
                                                <option value="recursos_humanos">Recursos Humanos</option>
                                                <option value="finanzas">Finanzas</option>
                                                <option value="tecnologia">Tecnología</option>
                                            </select>
                                        </div>

                                        <!-- Foto -->
                                        <div class="col-md-12 mb-3">
                                            <label for="foto" class="form-label">Foto del empleado</label>
                                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="mostrarVistaPrevia(event)">
                                            <small class="form-text text-muted">Seleccione una foto desde los archivos de su dispositivo.</small>
                                            <div class="mt-2">
                                                <img id="vistaPreviaFoto" src="#" alt="Vista previa de la foto 4x4" style="display:none; width: 120px; height: 120px; object-fit: cover; border: 1px solid #ccc; border-radius: 8px;" />
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                            </div>
                            <div class="col-12 col-lg-3  mt-4">
                                <div class="card border-0 shadow-lg ">
                                    <div class="card-body">
                                        <h5 class="card-title">Observaciones</h5>
                                        <div class="row">
                                           <textarea name="observacion" id="observacion" class="observacion-control" rows="8" placeholder="Ingrese los datos del empleado aquí..." style="border:none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                              </div>
                                    <div class="col-12 col-lg-9">
                                  <div class="card border-0 shadow-lg mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos de Ingresos</h5>

                                        <div class="row">
                                        <!--Sexo-->
                                            <div class="col-md-6 mb-3">
                                                <label for="nomina" class="form-label">Nomina</label>
                                                <select class="form-select" id="nomina" name="nomina" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="mensual">Mensual</option>
                                                    <option value="quincenal">Quincenal</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>

                                             <div class="col-md-6 mb-3">
                                                <label for="numero_cuenta" class="form-label">Numero de Cuenta</label>
                                                <input type="text" class="form-control" id="numero_cuen" name="numero_cuen" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="banco" class="form-label">Banco</label>
                                                <select class="form-select" id="banco" name="banco" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="banco1">Popular</option>
                                                    <option value="banco2">Banreservas</option>
                                                    <option value="banco3">Scotiabank</option>
                                                </select>
                                            </div>


                                            <div class="col-md-6 mb-3">
                                                <label for="salario" class="form-label">Salario</label>
                                                <input type="number" class="form-control" id="salario" name="sueldo_men" placeholder="Ingrese salario" required>
                                        </div>

                                    </div>

                                </div>
                            </div>
                              <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="/Esnomina/index.php?page=empleado" class="boton-regresar mt-1 btn">Regresar</a>
                                        <button type="submit" class="boton-guardar mt-1">Guardar</button>
                                    </div>
                              </div>
                        </div>
                    </fieldset>
                </form>
            </main>
          

        </div>
    </div>

    <!-- ======================== Scripts ======================== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- International Telephone Input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script>
        // Scroll suave al abrir Datos Laborales
        document.getElementById('mostrarLaborales').addEventListener('click', function () {
            setTimeout(() => {
                document.getElementById('datos-laborales').scrollIntoView({ behavior: 'smooth' });
            }, 300); 
        });

        // Inicialización de IntlTelInput
        const input = document.querySelector("#telefono");
        const iti = window.intlTelInput(input, {
            initialCountry: "do",
            preferredCountries: ["do", "us", "es", "mx", "co"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        // Enviar número completo al backend
        document.querySelector("form").addEventListener("submit", function() {
            input.value = iti.getNumber(); 
        });
    </script>

</body>
</html>
