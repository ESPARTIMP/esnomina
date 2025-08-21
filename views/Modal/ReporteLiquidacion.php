<!-- Modal Reporte de Liquidaciones General -->
<div class="modal fade" id="modalLiquidaciones" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4 border-0 shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">Reporte de Liquidaciones</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <!-- Filtros -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label>Consultas</label>
            <select class="form-select"></select>
          </div>
          <div class="col-md-4">
            <div class="row">
                <label>Periodo</label>
                <input type="date" class="form-control d-inline w-50">
                <input type="date" class="form-control d-inline w-50">
            </div>
          
          </div>
          <div class="col-md-2 d-flex align-items-end">
            <button class="btn-limpiar">Limpiar</button>
            <button class="btn-aplicar">Aplicar</button>
          </div>
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
          <table class="table table-borderless align-middle">
            <thead class="table-light">
              <tr>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Monto De Liquidación</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Juan Pérez</td>
                <td>01/03/04</td>
                <td>Renuncia</td>
                <td>$25,000</td>
              </tr>
              <tr>
                <td>Verónica Lugo</td>
                <td>01/03/04</td>
                <td>Despido</td>
                <td>$32,000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal-footer">
             <button class="btn-pdf">PDF</button>
              <button class="btn-pdf">Excel</button>
            </div>
    </div>
  </div>
</div>
