<?php // GraficaNomina.php - Gráfica SVG en card Bootstrap, estilos en nominas.css ?>
<div class="card mb-4 border-0 shadow-lg grafica-nomina rounded-0" data-marker-url="/Esnomina/views/Iconos/Circulo.png">
    <div class="card-body">
        <div class="chart-header">
            <h6 class="card-title">Gráfico Nómina (últimos 6 meses)</h6>
        </div>

        <div class="chart-container">
            <svg viewBox="0 0 700 350" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#3c4fe0" stop-opacity="0.5" />
                        <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
                    </linearGradient>
                </defs>

    

       
                <!-- Área del gráfico -->
                <path class="area-path" d="" id="area-path" />

                <!-- Puntos y etiquetas -->
                <g id="data-points"></g>
                <g id="value-labels"></g>
            </svg>
        </div>

        <div class="months" id="months-container"></div>
    </div>
</div>

<script>
    // Inicializar tras carga para evitar conflictos con otros componentes
    window.addEventListener('load', function () {
        // Datos de ejemplo (en miles)
        const payrollData = [10000, 21400, 12000, 16000, 24000, 10000];
        const months = ['Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'];

        const svgWidth = 700;
        const svgHeight = 350;
        const padding = 50;
        const chartWidth = svgWidth - padding * 2;
        const chartHeight = svgHeight - padding * 2;

        const xScale = chartWidth / (payrollData.length - 1);
        const yMax = Math.max(...payrollData) * 1.1;

        function getX(i) { return padding + i * xScale; }
        function getY(v) { return svgHeight - padding - (v / yMax) * chartHeight; }

        let d = `M${getX(0)},${getY(payrollData[0])}`;
        for (let i = 1; i < payrollData.length; i++) d += ` L${getX(i)},${getY(payrollData[i])}`;
        d += ` L${getX(payrollData.length - 1)},${svgHeight - padding}`;
        d += ` L${getX(0)},${svgHeight - padding} Z`;
        document.getElementById('area-path').setAttribute('d', d);

    const pts = document.getElementById('data-points');
    const labels = document.getElementById('value-labels');
    const container = document.querySelector('.grafica-nomina');
    const markerUrl = (container && container.getAttribute('data-marker-url')) || (window.NOMINA_MARKER_URL || '');
    const markerSizeAttr = container ? container.getAttribute('data-marker-size') : null;
    const markerSize = markerSizeAttr ? (parseInt(markerSizeAttr, 10) || 16) : 16; // px
    const half = markerSize / 2;
        const currentValueEl = document.getElementById('current-value');
        payrollData.forEach((value, index) => {
            const x = getX(index);
            const y = getY(value);
            if (markerUrl) {
                const img = document.createElementNS('http://www.w3.org/2000/svg', 'image');
                // href for modern browsers; xlink:href for backward compatibility
                img.setAttribute('href', markerUrl);
                img.setAttributeNS('http://www.w3.org/1999/xlink', 'href', markerUrl);
                img.setAttribute('x', x - half);
                img.setAttribute('y', y - half);
                img.setAttribute('width', markerSize);
                img.setAttribute('height', markerSize);
                img.setAttribute('class', 'data-point-img');
                img.addEventListener('mouseover', function () {
                    if (currentValueEl) currentValueEl.textContent = value + 'K';
                });
                pts.appendChild(img);
            } else {
                const point = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                point.setAttribute('cx', x);
                point.setAttribute('cy', y);
                point.setAttribute('r', '6');
                point.setAttribute('class', 'data-point');
                point.addEventListener('mouseover', function () {
                    if (currentValueEl) currentValueEl.textContent = value + 'K';
                });
                pts.appendChild(point);
            }

            const label = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            label.setAttribute('x', x);
            label.setAttribute('y', y - 15);
            label.setAttribute('class', 'value-label');
            label.textContent = `RD$ ${value} K`;
            labels.appendChild(label);
        });

        const monthsContainer = document.getElementById('months-container');
        months.forEach(m => {
            const span = document.createElement('span');
            span.textContent = m;
            span.className = 'month';
            monthsContainer.appendChild(span);
        });

    if (currentValueEl) currentValueEl.textContent = payrollData[payrollData.length - 1] + 'K';
    });
</script>
