<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próximos Pagos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-pagos {
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            min-width: 400px;
            max-width: 500px;
            margin: 0 auto;
            height: 100%;
        }
        
        .card-header-pagos {
            background-color: #ffffffff;
            color: black;
            font-weight: 600;
            border: none !important;
        }
        
        .table-container {
            max-height: 382px;
            overflow-y: auto;
        }
        
        /* Personalización del scroll */
        .table-container::-webkit-scrollbar {
            width: 8px;
        }
        
        .table-container::-webkit-scrollbar-track {
            border-radius: 4px;
        }
        
        .table-container::-webkit-scrollbar-thumb {
            background: #535151ff;
            border-radius: 4px;
        }
        
        .table-container::-webkit-scrollbar-thumb:hover {
            background: #bdb9b9ff;
        }
        
        .table-pagos {
            margin-bottom: 0;
        }
        
        .table-pagos thead {
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .table-pagos th {
            border-top: none;
            font-weight: 600;
            color: #495057;
            padding: 12px 15px;
        }
        
        .table-pagos td {
            padding: 12px 15px;
            vertical-align: middle;
        }
        
        .table-pagos tbody tr:hover {
            background-color: rgba(255, 77, 77, 0.05);
        }
        
        .user-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 8px;
            border: 2px solid #e9ecef;
        }
        
        .user-name {
            font-weight: 500;
            color: #343a40;
        }
        
        .payment-date {
            color: #6c757d;
            font-weight: 500;
        }
        
        .payment-amount {
            font-weight: 600;
            color: #28a745;
        }
        
        @media (max-width: 576px) {
            .table-pagos {
                font-size: 0.9rem;
            }
            
            .table-pagos td, .table-pagos th {
                padding: 10px 8px;
            }
            
            .user-avatar {
                width: 24px;
                height: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="card card-pagos shadow-lg">
        <div class="card-header card-header-pagos">
            <h5 class="mb-0">Ultimos Pagos</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-container">
                <table class="table table-pagos table-borderless">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Pedro+A&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Pedro A.</span>
                                </div>
                            </td>
                            <td class="payment-date">11 Ago</td>
                            <td class="payment-amount">RD$50k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Kiara+B&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Kiara B.</span>
                                </div>
                            </td>
                            <td class="payment-date">12 Ago</td>
                            <td class="payment-amount">RD$50k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Maria+C&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Maria C.</span>
                                </div>
                            </td>
                            <td class="payment-date">13 Ago</td>
                            <td class="payment-amount">RD$75k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Juan+D&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Juan D.</span>
                                </div>
                            </td>
                            <td class="payment-date">14 Ago</td>
                            <td class="payment-amount">RD$45k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Laura+E&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Laura E.</span>
                                </div>
                            </td>
                            <td class="payment-date">15 Ago</td>
                            <td class="payment-amount">RD$60k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Carlos+F&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Carlos F.</span>
                                </div>
                            </td>
                            <td class="payment-date">16 Ago</td>
                            <td class="payment-amount">RD$55k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Sofia+G&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Sofia G.</span>
                                </div>
                            </td>
                            <td class="payment-date">17 Ago</td>
                            <td class="payment-amount">RD$80k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Diego+H&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Diego H.</span>
                                </div>
                            </td>
                            <td class="payment-date">18 Ago</td>
                            <td class="payment-amount">RD$65k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Diego+H&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Diego H.</span>
                                </div>
                            </td>
                            <td class="payment-date">18 Ago</td>
                            <td class="payment-amount">RD$65k</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Diego+H&background=808080&color=fff" class="user-avatar">
                                    <span class="user-name">Diego H.</span>
                                </div>
                            </td>
                            <td class="payment-date">18 Ago</td>
                            <td class="payment-amount">RD$65k</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>