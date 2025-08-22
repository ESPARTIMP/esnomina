<?php
// Card con gráfica de barras usando Chart.js
?>
<div class="card mb-4 border-0 shadow-lg">
    <div class="card-body">
        <h6 class="card-title" style="font-weight: 600; color: #232946;">Horas Trabajadas vs Horas Extras</h6>
        <canvas id="graficaBarra" class="chart-canvas" style="width: 220px; height: 125px;"></canvas>
         </div>
  
       </div>
   <script>
   const ctx = document.getElementById('graficaBarra').getContext('2d');
   new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
        datasets: [
            {
                label: 'Horas Trabajadas',
                data: [120, 150, 170, 160, 180, 140, 130],
                backgroundColor: 'rgba(57, 181, 74, 0.65)',
            },
            {
                label: 'Horas Extras',
                data: [20, 30, 25, 35, 40, 30, 28],
                backgroundColor: '#A1B4FF',
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
        },
        scales: {
            x: {
                grid: { display: false }
            },
            y: {
                grid: { display: false }
            }
        }
    }
});
</script>
