<?php
// CardEmpleados.php
?>

<style>
  .custom-footer {
  margin-top: 10px;
  background: transparent;
  border-top: none;
  border-radius: 0 0 0.375rem 0.375rem; /* solo esquinas inferiores */
  padding: 0;
}

</style>
<div class="card text-start mb-4" style="min-width: 280px; height:100px;">
  <div class="card-body">
    <h6 class="card-title">Empleados Activos</h6>
    <h3 class="card-text">100</h3>
  </div>
  
    <div class="card-footer custom-footer border-izquierdo  p-0" style="margin-top: 10px; background: transparent;">
      <a href="/Esnomina/index.php?page=empleado" class="btn w-100 py-2" role="button" style="background-color:#A1B4FF; color:#fff; border-color:#A1B4FF; border-radius: 0 0 .375rem .375rem;">
        Crear Empleado
      </a>
    </div>
  
</div>
