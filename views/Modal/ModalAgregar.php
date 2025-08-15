<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Esnomina/assets/css/modal">
    <title>Modal Agregar</title>
</head>
<body>
    
<?php /* Modal Agregar Departamento */ ?>
<div class="modal fade" id="modalAgregarDepartamento" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <form action="procesar_departamento.php" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Agregar Departamento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="nombre_departamento" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required>
            </div>
            <div class="col-md-6">
              <label for="codigo_departamento" class="form-label">Código</label>
              <input type="text" class="form-control" id="codigo_departamento" name="codigo_departamento" required>
            </div>
            <div class="col-md-6">
              <label for="responsable" class="form-label">Responsable</label>
              <input type="text" class="form-control" id="responsable" name="responsable">
            </div>
            <div class="col-md-6">
              <label for="empleados" class="form-label">Empleados</label>
              <input type="number" class="form-control" id="empleados" name="empleados" min="0" value="0">
            </div>
            <div class="col-12">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="2"></textarea>
            </div>
            <div class="col-12">
              <label for="estado" class="form-label">Estado</label>
              <select class="form-select" id="estado" name="estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
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
  document.querySelectorAll('[data-bs-target="#modalAgregarDepartamento"]').forEach(btn=>{
    btn.addEventListener('click', e => {
      const el = document.getElementById('modalAgregarDepartamento');
      if (el) new bootstrap.Modal(el).show();
    });
  });
</script>
    
</body>
</html>