<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos anteriores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container-ProximoPago {
            max-height: 240px;
            overflow-y: auto;
        }

       /* Personalización del scroll */
        .table-container-ProximoPago::-webkit-scrollbar {
            width: 8px;
        }
        
        .table-container-ProximoPago::-webkit-scrollbar-track {
            border-radius: 4px;
        }

        .table-container-ProximoPago::-webkit-scrollbar-thumb {
            background: #535151ff;
            border-radius: 4px;
        }

        .table-container-ProximoPago::-webkit-scrollbar-thumb:hover {
            background: #bdb9b9ff;
        }
    </style>
</head>
<body>
    <div class="card card-pagos shadow-lg">
        <div class="card-header card-header-pagos ">
            <h5 class="mb-0" style="color: #ff0000ff;">Próximos Pagos</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-container-ProximoPago ">
                <table class="table table-pagos  table-borderless">
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