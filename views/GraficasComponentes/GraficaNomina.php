<?php
// GraficaNomina.php - Gráfica CanvasJS (splineArea) adaptada al card
?>
<div class="card mb-4 border-0 shadow-lg">
    <div class="card-body">
        <h6 class="card-title" style="font-weight: 600; color: #000000ff;">Gráfico Nómina</h6>
        <div id="chartNomina" style="height: 360px; width: 100%;"></div>
    </div>
  
</div>
<!-- Mantener Chart.js disponible para otras gráficas que lo usan -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- CanvasJS -->
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    try {
                var chart = new CanvasJS.Chart("chartNomina", {
            animationEnabled: true,
            backgroundColor: "transparent",
                        axisY: {
                            gridThickness: 0,
                            tickThickness: 0,
                            lineThickness: 0,
                            labelFontColor: "#9aa0a6"
                        },
                        axisX: {
                            gridThickness: 0,
                            tickThickness: 0,
                            lineThickness: 0,
                            labelFontColor: "#9aa0a6"
                        },
            data: [{
                type: "splineArea",
                color: "rgba(0, 110, 255, 0.47)",
                markerSize: 5,
                dataPoints: [
                    { x: new Date(2000, 0), y: 3289000 },
                    { x: new Date(2001, 0), y: 3830000 },
                    { x: new Date(2002, 0), y: 2009000 },
                    { x: new Date(2003, 0), y: 2840000 },
                    { x: new Date(2004, 0), y: 2396000 },
                    { x: new Date(2005, 0), y: 1613000 },
                    { x: new Date(2006, 0), y: 2821000 },
                    { x: new Date(2007, 0), y: 2000000 },
                    { x: new Date(2008, 0), y: 1397000 },
                    { x: new Date(2009, 0), y: 2506000 },
                    { x: new Date(2010, 0), y: 2798000 },
                    { x: new Date(2011, 0), y: 3386000 },
                    { x: new Date(2012, 0), y: 6704000 },
                    { x: new Date(2013, 0), y: 6026000 },
                    { x: new Date(2014, 0), y: 2394000 },
                    { x: new Date(2015, 0), y: 1872000 },
                    { x: new Date(2016, 0), y: 2140000 }
                ]
            }]
        });
        chart.render();
    } catch (e) {
        console && console.error && console.error('Error renderizando CanvasJS:', e);
    }
});
</script>
