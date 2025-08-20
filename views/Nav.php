<head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="Esnomina/assets/css/styles.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<nav style="position: fixed; top: 0; left: 0; width: 100vw; height: 60px; z-index: 1000; background: #fff; color: #232946; display: flex; align-items: center; justify-content: space-between; padding: 0 30px; font-family: 'Segoe UI', Arial, sans-serif; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
    <div style="display: flex; align-items: center; gap: 18px;">
        <span style="font-size: 1.2rem; font-weight: 500;">Eudy, Bienvenido al sistema</span>
        <span style="width: 2px; height: 30px; background: #232946; display: inline-block;"></span>
        <span style="font-size: 1rem; min-width: 100px;"><?php echo date('d/m/Y'); ?></span>

       
    </div>

     <div class ="iconos" style="display: flex; align-items: center; gap: 20px;"> 
            <a href="">
                  <img src="/Esnomina/views/Iconos/Interrogacion.png" style="width:24px; height:26px; margin-right:8px;">       
            </a>
             <a href="">
                  <img src="/Esnomina/views/Iconos/Notificacion.png" style="width:24px; height:26px; margin-right:8px;">       
            </a>
            <a href="">
                  <img src="/Esnomina/views/Iconos/Tuerca.png" style="width:24px; height:26px; margin-right:8px;">       
            </a>        
             <a href="">
                  <img src="/Esnomina/views/Iconos/Calendario.png" style="width:24px; height:26px; margin-right:8px;">       
            </a>     
        </div>
    <style>
        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                height: auto !important;
                padding: 10px 5px !important;
            }
            nav input[type="text"] {
                width: 100vw !important;
                margin: 10px 0;
            }
           body {
               font-size: 1rem; /* o el tamaño que prefieras */
               font-family: 'Segoe UI', Arial, sans-serif;
            }
        }
    </style>
</nav>
