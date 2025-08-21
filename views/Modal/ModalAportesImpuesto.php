<!-- Modal Reporte de Aportes e Impuestos -->
<div class="modal fade" id="modalAportes" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4 border-0 shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">Reporte de Aportes e Impuestos</h5>
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
                <th>AFP</th>
                <th>ARS</th>
                <th>INFOTEP</th>
                <th>ISR</th>
                <th>Total De Aportes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Juan Pérez</td>
                <td>1,200</td>
                <td>800</td>
                <td>350</td>
                <td>1,000</td>
                <td>$3,350</td>
              </tr>
              <tr>
                <td>Verónica Lugo</td>
                <td>1,100</td>
                <td>750</td>
                <td>310</td>
                <td>900</td>
                <td>$3,090</td>
              </tr>
              <tr class="fw-bold table-light">
                <td>Total General</td>
                <td>2,300</td>
                <td>1,550</td>
                <td>660</td>
                <td>1,900</td>
                <td>$6,440</td>
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
