<?php
// Modal/ModalAgregarEmpleado.php - Modal para crear un nuevo empleado
?>

<!-- Estilos específicos para el modal -->
<style>
    .modal-xl {
        max-width: 95%;
    }
    
    @media (min-width: 992px) {
        .modal-xl {
            max-width: 90%;
        }
    }
    
    @media (min-width: 1200px) {
        .modal-xl {
            max-width: 1140px;
        }
    }
    
    /* Estilos específicos para el formulario dentro del modal */
    #modalAgregarEmpleado .form-control:focus,
    #modalAgregarEmpleado .form-select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    
    /* Estilos personalizados restaurados del formulario original */
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
        background: #0E0C35; 
        border: none; 
        color: white; 
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3); 
        transition: all 0.3s ease; 
    }
    
    .boton-guardar {
        margin-left: 0.3%;
        background: #AEF0FF;
        border: none;
        color: white;
        padding: 5px 25px;
        border-bottom-right-radius: 50px; 
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        transition: all 0.3s ease;
    }
    
    .btn-personalizado:hover { 
        background-color: #ca2339; 
    }
    

    /* Estilos para el input de teléfono internacional */
    .iti { 
        width: 100%; 
    }
    
    .iti input { 
        width: 100%; 
    }
    /* Botón para quitar imagen del marco de perfil */
    .profile-remove-btn {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: none;
        background: rgba(220, 53, 69, 0.9);
        color: #fff;
        display: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(0,0,0,0.25);
    }
    .profile-remove-btn:hover { background: #dc3545; }
/* Importante: estilos del marco de foto están en /assets/css/perfil-foto.css */
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

<!-- Modal para crear nuevo empleado -->
<div class="modal fade" id="modalAgregarEmpleado" tabindex="-1" aria-labelledby="modalAgregarEmpleadoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarEmpleadoLabel">Registrar Nuevo Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- CSS del marco de foto -->
                <link rel="stylesheet" href="/Esnomina/assets/css/perfil-foto.css">
                <form id="formularioEmpleado" method="POST" action="/Esnomina/views/funciones/empleados.php" enctype="multipart/form-data">
                    <!-- ======================== Datos Personales ======================== -->
                    <fieldset id="datos-empleado">
                        <div class="row">
                            <!-- Información personal -->
                            <div class="col-12 col-lg-7">
                                <div class="card border-0 shadow-lg">
                                    <div class="card-body">
                                     <h5 class="card-title">Datos Personales</h5>
                                        <!-- Marco de Foto de Perfil -->
                                            <div class="mb-3 d-flex flex-column align-items-start">
                                                    <div class="profile-frame" id="profileFrame" style="position: relative;">
                                                       <div class="profile-placeholder">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        <img id="profileImage" class="profile-img" alt="Foto de perfil" style="display:none;">
                                                        <div class="profile-upload-icon" onclick="document.getElementById('fileInputPerfil').click()">
                                                              <i class="bi bi-camera"></i>
                                                        </div>
                                                        <button type="button" id="removeProfileImage" class="profile-remove-btn" title="Quitar foto" aria-label="Quitar foto">
                                                            <i class="bi bi-x"></i>
                                                        </button>
                                                   </div>
                                                 <input type="file" id="fileInputPerfil" name="foto" class="file-input" accept="image/*" style="display:none;">
                                               </div>
                                            <div class="row">

                                            <div class="col-10">

                                            </div>
                                            

                                            <!--Cédula-->
                                            <div class="col-md-6 mb-3">
                                                <label for="cedula" class="form-label">Cédula</label>
                                                <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Ingrese cédula" required maxlength="14">
                                            </div>

                                            <!-- Fecha Nacimiento -->
                                            <div class="col-md-6 mb-3">
                                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nac" required>
                                            </div>
                                            <!-- Nombre Completo -->
                                            <div class="col-md-6 mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required>
                                            </div>

                                             <!--Lugar de Nacimiento-->

                                            <div class="col-md-6 mb-3">
                                                <label for="lugar_nacimiento" class="form-label">Lugar de Nacimiento</label>
                                                <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Ingrese lugar de nacimiento" required>
                                            </div>

                                            <!--Apellido-->

                                            <div class="col-md-6 mb-3">
                                                <label for="apellido" class="form-label">Apellido</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese apellido" required>
                                            </div>

                                            <!--Residencia-->

                                            <div class="col-md-6 mb-3">
                                                <label for="residencia" class="form-label">Residencia</label>
                                                <input type="text" class="form-control" id="residencia" name="residencia" placeholder="Ingrese residencia" required>
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
                                            <div class="col-12 mb-5">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required>
                                            </div>

                                            <br>

                                        </div>

                                    </div>
                                        
                                </div>
                            </div>

                            <!-- Información empresarial + Ingresos -->
                            <div class="col-12 col-lg-5">
                                <!-- Datos Empresariales -->
                                <div class="card border-0 shadow-lg">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Empresariales</h5>

                                        <!-- Codigo -->
                                        <div class="col-md-12 mb-3">
                                            <label>Codigo</label>
                                            <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Ingrese código del empleado" required maxlength="50">
                                        </div>

                                        <!-- Fecha de ingreso -->
                                        <div class="col-md-12 mb-3">
                                            <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                                        </div>

                                        <!-- Tipo de contrato -->
                                        <div class="col-md-12 mb-3">
                                            <label for="tipo_contrato" class="form-label">Tipo de contrato</label>
                                            <select class="form-select" id="tipo_contrato" name="tipo_contrato">
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
                                                <option value="">Seleccione</option>
                                                <option value="recursos_humanos">Recursos Humanos</option>
                                                <option value="finanzas">Finanzas</option>
                                                <option value="tecnologia">Tecnología</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===== Datos de Ingresos (debajo de Empresariales) ===== -->
                                <div class="card border-0 shadow-lg mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos de Ingresos</h5>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="nomina" class="form-label">Nómina</label>
                                                <select class="form-select" id="nomina" name="nomina" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="mensual">Mensual</option>
                                                    <option value="quincenal">Quincenal</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="numero_cuenta" class="form-label">Número de Cuenta</label>
                                                <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="banco" class="form-label">Banco</label>
                                                <select class="form-select" id="banco" name="banco" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="banco1">Popular</option>
                                                    <option value="banco2">Banreservas</option>
                                                    <option value="banco3">Scotiabank</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="salario" class="form-label">Salario</label>
                                                <input type="number" class="form-control" id="salario" name="salario" placeholder="Ingrese salario" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 mt-4">
                                <div class="card border-0 shadow-lg ">
                                    <div class="card-body">
                                        <h5 class="card-title">Observaciones</h5>
                                        <div class="row">
                                           <textarea name="observacion" id="observacion" class="observacion-control" rows="7" placeholder="Ingrese los datos del empleado aquí..." style="border:none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            
                        </div>
                        
                    </fieldset> 

                    <div class= "row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="boton-regresar" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="boton-guardar">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para el campo de teléfono internacional y la vista previa de la foto -->
<script>
    // Función para vista previa de la foto
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

    // Inicialización del teléfono internacional cuando se abre el modal
    document.addEventListener('DOMContentLoaded', function() {
        const modalEl = document.getElementById('modalAgregarEmpleado');
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function() {
                if (window.intlTelInput) {
                    const input = document.querySelector("#telefono");
                    const iti = window.intlTelInput(input, {
                        initialCountry: "do",
                        preferredCountries: ["do", "us", "es", "mx", "co"],
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                    });

                    // Enviar número completo al backend
                    document.querySelector("#formularioEmpleado").addEventListener("submit", function() {
                        input.value = iti.getNumber(); 
                    });
                }
            });
        }
    });

        // Lógica del marco de foto de perfil (selección + arrastrar/soltar)
        document.addEventListener('DOMContentLoaded', function() {
            const profileFrame = document.getElementById('profileFrame');
            const fileInput = document.getElementById('fileInputPerfil');
            const profileImage = document.getElementById('profileImage');
            const placeholder = document.querySelector('#profileFrame .profile-placeholder');
            const removeBtn = document.getElementById('removeProfileImage');

            if (!profileFrame || !fileInput) return;

            function setPreview(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                    profileImage.style.display = 'block';
                    if (placeholder) placeholder.style.display = 'none';
                    if (removeBtn) removeBtn.style.display = 'flex';
                };
                reader.readAsDataURL(file);
            }

            function clearPreview() {
                if (!fileInput || !profileImage) return;
                fileInput.value = '';
                profileImage.removeAttribute('src');
                profileImage.style.display = 'none';
                if (placeholder) placeholder.style.display = '';
                if (removeBtn) removeBtn.style.display = 'none';
            }

            fileInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    setPreview(e.target.files[0]);
                }
            });

            profileFrame.addEventListener('dragover', function(e) {
                e.preventDefault();
                profileFrame.style.border = '4px dashed #0d6efd';
            });
            profileFrame.addEventListener('dragleave', function() {
                profileFrame.style.border = '4px solid #fff';
            });
            profileFrame.addEventListener('drop', function(e) {
                e.preventDefault();
                profileFrame.style.border = '4px solid #fff';
                if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                    fileInput.files = e.dataTransfer.files;
                    setPreview(e.dataTransfer.files[0]);
                }
            });

            if (removeBtn) {
                removeBtn.addEventListener('click', clearPreview);
            }
        });
</script>
