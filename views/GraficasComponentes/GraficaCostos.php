<?php
// GraficaCostos.php - Gráfica de pastel (distribución de costos)
?>
<div class="card mb-4 border-0 shadow-lg">
    <div class="card-body">
    <h6 class="card-title" style="font-weight: 600; color: #232946;">Distribución De Costos</h6>
        <div class="d-flex justify-content-center">
            <canvas id="graficaCostos" style="width: 220px; height: 220px;"></canvas>
        </div>
  </div>
</div>
<script>
const ctxCostos = document.getElementById('graficaCostos').getContext('2d');
new Chart(ctxCostos, {
    type: 'pie',
    data: {
        datasets: [{
            data: [30, 25, 20, 15, 10],
            backgroundColor: [
                '#A1B4FF',
                '#FFB4A1',
                '#A1FFD6',
                '#FFD6A1',
                '#D6A1FF'
            ]
        }]
    },
    options: {
                responsive: true,
                maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom' },
        }
    }
});
</script>
