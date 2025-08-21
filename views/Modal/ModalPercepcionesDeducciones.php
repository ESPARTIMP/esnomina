<!-- Modal Reporte de Liquidaciones Detalle -->
<div class="modal fade" id="modalLiquidacionesDetalle" tabindex="-1" aria-hidden="true">
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
            <label>Empleado</label>
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
                <th>Concepto</th>
                <th>Ingresos</th>
                <th>Deducciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sueldo Base</td>
                <td>$30,000</td>
                <td>$0</td>
              </tr>
              <tr>
                <td>Horas Extra</td>
                <td>$5,000</td>
                <td>$0</td>
              </tr>
              <tr>
                <td>AFP</td>
                <td>$0</td>
                <td>$2,500</td>
              </tr>
              <tr>
                <td>Seguro De Salud</td>
                <td>$0</td>
                <td>$1,500</td>
              </tr>
              <tr class="fw-bold table-light">
                <td>Totales</td>
                <td>$35,000</td>
                <td>$4,000</td>
                <td class="text-success">$31,000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn-pdf">PDF</button>
        <button class="btn-pdf">EXCEL</button>
      </div>
    </div>
  </div>
</div>
