<?php
// GraficaNomina.php - Gráfica de línea (últimos 6 meses)
?>
<div class="card mb-4">
  <div class="card-body">
    <h6 class="card-title" style="font-weight: 600; color: #232946;">Gráfico Nómina (últimos 6 meses)</h6>
    <canvas id="graficaNomina" height="373" width="900"></canvas>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctxNomina = document.getElementById('graficaNomina').getContext('2d');
new Chart(ctxNomina, {
    type: 'line',
    data: {
        labels: ['Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
        datasets: [{
            label: 'Nómina',
            data: [900000, 950000, 1100000, 1050000, 1200000, 1150000, 1245000],
            fill: true,
            borderColor: '#A1B4FF',
            backgroundColor: 'rgba(161,180,255,0.2)',
            pointBackgroundColor: '#FF2646',
            pointRadius: 6,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
        }
    }
});
</script>
