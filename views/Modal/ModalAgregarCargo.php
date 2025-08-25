<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Esnomina/assets/css/modal.css">
    <title>Modal Agregar Cargo</title>
    <style>
      .form-text { font-size: .85rem; }
    </style>
    
</head>
<body>
    
<?php /* Modal Agregar Cargo */ ?>
<div class="modal fade" id="modalAgregarCargo" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <form action="views/funciones/empleados.php?consulta=ingresar_cargo" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Agregar Cargo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-4">
              <label for="codigo" class="form-label">Código del Cargo</label>
              <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="col-md-8">
              <label for="cargo" class="form-label">Nombre del Cargo</label>
              <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ej: Analista de RRHH" required>
            </div>

            <div class="col-md-6">
              <label for="departamento" class="form-label">Departamento</label>
              <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ej: RH-001 o Recursos Humanos" required>
              <div class="form-text">Usa el código o nombre del departamento al que pertenece el cargo.</div>
            </div>
            <div class="col-md-6">
              <label for="responsable" class="form-label">Responsable</label>
              <input type="text" class="form-control" id="responsable" name="responsable" placeholder="Ej: Ana Pérez">
            </div>

            <div class="col-md-6">
              <label for="vacantes" class="form-label">Vacantes</label>
              <input type="number" class="form-control" id="vacantes" name="vacantes" min="0" value="0">
            </div>
            <div class="col-md-6">
              <label for="estado" class="form-label">Estado</label>
              <select class="form-select" id="estado" name="estado">
                <option value="Activo" selected>Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>
            <div class="col-12">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Describe funciones o notas del cargo"></textarea>
            </div>
           
          </div>
        </div>

        <div class="modal-footer border-top">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('[data-bs-target="#modalAgregarCargo"]').forEach(btn=>{
    btn.addEventListener('click', e => {
      const el = document.getElementById('modalAgregarCargo');
      if (el) new bootstrap.Modal(el).show();
    });
  });
</script>
    
</body>
</html>