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
      <form action="views/funciones/empleados.php?consulta=ingresar_departamento" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Agregar Departamento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="codigo" class="form-label">Código</label>
              <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="col-md-6">
              <label for="departamento" class="form-label">Departamento</label>
              <input type="text" class="form-control" id="departamento" name="departamento" required>
            </div>
            <div class="col-md-6">
              <label for="departamento_sup" class="form-label">Departamento Superior</label>
              <input type="text" class="form-control" id="departamento_sup" name="departamento_sup">
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