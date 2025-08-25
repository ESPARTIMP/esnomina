<?php
require_once(__DIR__ . "/../conexion/conexion.php");

$verificar = $_GET['consulta'];

if ($verificar == 'agregar_nomina') {

    $codigo_nom   = $_POST['codigo_nom'];
    $detalle      = $_POST['descripcion'];
    $fecha_ini    = $_POST['fecha_ini'];
    $fecha_fin    = $_POST['fecha_fin'];
    $fecha_pago   = $_POST['fecha_pago'];
    $tipo_nomina  = $_POST['tipo_nomina'];

    // Configuración
    $horas_por_dia       = 7.8;
    $horas_semanales     = 39;
    $dias_trabajados_mes = 23.83;
    $dias_quincenales = $dias_trabajados_mes / 2;
    $horas_quincenas = $dias_quincenales * $horas_por_dia;
    $dias_semana = 5;


    // Simulación de horas (estas deberían venir de bio o marcaciones)
    $horas_normales           = 39;
    $horas_extras             = 10;
    $horas_fin_semana         = 10;
    $horas_extras_fin_semana  = 5;
    $horas_nocturnas          = 3;
    $horas_extras_nocturnas   = 1;
    $horas_feriadas           = 4;
    $horas_extras_feriadas    = 2;
    $horas_tardanza           =5.3;

    // Descuentos
    $afp = 0.0287; // deberías calcular %
    $sfs = 0.0304; // deberías calcular %

    //Valores de horas 
    $valor_horas_extras = 1.35;
    $valor_horas_nocturnas =1.35 ;
    $valor_horas_extras_nocturnar = 1.6;
    $valor_horas_feriadas = 2;
    $valor_horas_extras_feriadas =2.25;
    $valor_horas_fin_semana = 2;
    $valor_horas_extras_fin_semana = 2.25;


    // Verificar si la nómina ya existe
    $consultar_nomina = "SELECT * FROM nomina WHERE codigo_nom = :codigo_nom";
    $stmt = $pdo->prepare($consultar_nomina);
    $stmt->execute([":codigo_nom" => $codigo_nom]);

    if ($stmt->rowCount() == 0) {

        // Buscar empleados de ese tipo de nómina
        $consultar_empleados = "SELECT * FROM empleados WHERE nomina = :id";
        $stmt_empleados = $pdo->prepare($consultar_empleados);
        $stmt_empleados->execute([":id" => $tipo_nomina]);

        $empleados = $stmt_empleados->fetchAll(PDO::FETCH_ASSOC);

        if (count($empleados) > 0) {

            try {
                $pdo->beginTransaction();

                $total_nomina = 0;
                $horas_normales_pagas = 0;
                $horas_extras_pagas   = 0;

                $horas_nocturnas_pagas = 0;
                $horas_extras_nocturnas_pagas = 0;
                $horas_fin_semana_pagas = 0;
                $horas_extras_fin_semana_pagas = 0;
                $horas_feriadas_pagas = 0;
                $horas_extras_feriadas = 0;

                $total_horas_normales_pagas = 0;
                $total_horas_extras_pagas = 0;
                $total_horas_nocturnas_pagas = 0;
                $total_horas_fin_semana_pagas = 0;
                $total_horas_extras_fin_semanas_pagas = 0;
                $total_horas_feriadas_pagas = 0;
                $total_horas_extras_feriadas_pagas = 0;

                $total_afp_pago = 0;
                $total_ars_pago = 0;
                $total_isr_pago = 0;

                // Primero calculamos todo por cada empleado
                foreach ($empleados as $emp) {

                    $id_empleado   = $emp['codigo'];
                    $nombre_emp    = $emp['nombre'];
                    $salario_base  = $emp['sueldo_men'];
                    $departamento  = $emp['departamento'];

                    $sueldo_bruto = 0;
                    $sueldo_neto  = 0;
                    $horas_extras_pagar = 0;

                    // Calcular sueldo según tipo de nómina
                    if ($tipo_nomina == "semanal") {
                        $semana = $salario_base * 12 / 52;
                      
                        $sueldo_hora = $semana / $horas_semanales;

                        
                        if (!empty($horas_extras) && $horas_extras > 0) {
                            $horas_extras_pagar = $sueldo_hora * $valor_horas_extras * $horas_extras;
                        }else{
                            $horas_extras_pagar = 0;
                        }
                        if (!empty($horas_fin_semana) && $horas_fin_semana > 0) {
                            $horas_fin_semana_pagar = $sueldo_hora * $valor_horas_fin_semana * $horas_fin_semana;
                        }else{
                            $horas_fin_semana_pagar = 0;
                        }
                        if (!empty($horas_extras_fin_semana) && $horas_extras_fin_semana > 0) {
                            $horas_extra_fin_semana_pagar = $sueldo_hora * $valor_horas_extras_fin_semana * $horas_extras_fin_semana;
                        }else{
                            $horas_extra_fin_semana_pagar = 0;
                        }
                        if (!empty($horas_nocturnas) && $horas_nocturnas > 0) {
                            $horas_nocturnas_pagar = $sueldo_hora * $valor_horas_nocturnas * $horas_nocturnas;
                        }else{
                            $horas_nocturnas_pagar = 0;
                        }
                        if (!empty($horas_extras_nocturnas) && $horas_extras_nocturnas > 0) {
                            $horas_extras_nocturnas_pagar = $sueldo_hora * $valor_horas_extras_nocturnar * $horas_extras_nocturnas;
                        }else{
                            $horas_extras_nocturnas_pagar = 0;
                        }
                        if (!empty($horas_feriadas ) && $horas_feriadas  > 0) {
                            $horas_feriadas_pagar = $sueldo_hora * $valor_horas_feriadas * $horas_feriadas;
                        }else{
                            $horas_feriadas_pagar = 0;
                        }
                        if (!empty($horas_extras_feriadas ) && $horas_extras_feriadas  > 0) {
                            $horas_extras_feriadas_pagar = $sueldo_hora * $valor_horas_extras_feriadas * $horas_extras_feriadas;
                        }else{
                            $horas_extras_feriadas_pagar = 0;
                        }
                        if(!empty($horas_tardanza) && $horas_tardanza > 0){
                            $horas_tardanza_descontar = $horas_tardanza * $sueldo_hora;
                        }else{
                            $horas_tardanza_descontar = 0;
                        }
                      // =========================
// CALCULO SUELDO BASE
// =========================
$sueldo_de_debengar = $sueldo_hora * $horas_semanales;
$sueldot = $sueldo_hora * $horas_normales;

$sueldo_bruto = $sueldot 
              + $horas_extras_pagar 
              + $horas_fin_semana_pagar 
              + $horas_extra_fin_semana_pagar 
              + $horas_nocturnas_pagar 
              + $horas_extras_nocturnas_pagar 
              + $horas_feriadas_pagar 
              + $horas_extras_feriadas_pagar;

$total_afp = $sueldo_bruto * $afp;
$total_ars = $sueldo_bruto * $sfs;

$total_deducciones = $total_afp + $total_ars;

// Inicialmente sueldo neto sin ISR
$sueldo_neto = $sueldo_bruto - $total_deducciones;

$horas_faltantes_a_pagar = $horas_semanales - $horas_normales;


// =========================
// CALCULO ISR ACUMULADO
// =========================
if (!function_exists('calcularISR2025')) {
    function calcularISR2025($sueldo_mensual) {
        if ($sueldo_mensual <= 34685.00) {
            return 0;
        } 
        elseif ($sueldo_mensual <= 52027.41) {
            return ($sueldo_mensual - 34685.00) * 0.15;
        } 
        elseif ($sueldo_mensual <= 72260.25) {
            return 2601.33 + ($sueldo_mensual - 52027.42) * 0.20;
        } 
        else {
            return 6648.00 + ($sueldo_mensual - 72260.26) * 0.25;
        }
    }
}

// Consultar acumulado del empleado
$stmt = $pdo->prepare("
    SELECT acumulado_mes 
    FROM isr_acumulado 
    WHERE codigo_emp = :empleado_id 
      AND YEAR(fecha) = YEAR(GETDATE()) 
      AND MONTH(fecha) = MONTH(GETDATE())");
$stmt->execute(['empleado_id' => $id_empleado]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$monto_acumulado = $row ? $row['acumulado_mes'] : 0;


// =========================
// DETECTAR SI ES ULTIMA SEMANA DEL MES
// =========================
$fecha_pago_dt = new DateTime($fecha_pago);
$ultimo_dia_mes = (clone $fecha_pago_dt)->modify('last day of this month');
$inicio_ultima_semana = (clone $ultimo_dia_mes)->modify('-6 days');

if ($fecha_pago_dt >= $inicio_ultima_semana && $fecha_pago_dt <= $ultimo_dia_mes) {
    
    // SUMAR ACUMULADO + SUELDO ACTUAL
    $acumulado_total = $monto_acumulado + $sueldo_bruto;
    
    // ISR acumulado total
    $isr_total = calcularISR2025($acumulado_total);
    
    // ISR ya retenido anteriormente
    $isr_pagado_anterior = calcularISR2025($monto_acumulado);
    
    // ISR que corresponde SOLO a esta semana
    $isr_pagar = $isr_total;

    // Reiniciar acumulado para el nuevo mes
    $stmt = $pdo->prepare("
        UPDATE isr_acumulado 
        SET acumulado_mes = 0 
        WHERE codigo_emp = :empleado_id 
          AND YEAR(fecha) = YEAR(GETDATE()) 
          AND MONTH(fecha) = MONTH(GETDATE())");
    $stmt->execute(['empleado_id' => $id_empleado]);

} else {
    // No es última semana → solo acumular sueldo
    $isr_pagar = 0;
    $nuevo_acumulado = $monto_acumulado + $sueldo_bruto;

    if ($row) {
        $stmt = $pdo->prepare("
            UPDATE isr_acumulado 
            SET acumulado_mes = :monto 
            WHERE codigo_emp = :empleado_id 
              AND YEAR(fecha) = YEAR(GETDATE()) 
              AND MONTH(fecha) = MONTH(GETDATE())");
        $stmt->execute([
            'monto' => $nuevo_acumulado,
            'empleado_id' => $id_empleado
        ]);
    } else {
        $stmt = $pdo->prepare("
            INSERT INTO isr_acumulado (codigo_emp, acumulado_mes, fecha) 
            VALUES (:empleado_id, :monto, GETDATE())");
        $stmt->execute([
            'empleado_id' => $id_empleado,
            'monto' => $sueldo_bruto
        ]);
    }
}

// =========================
// SUELDO NETO FINAL
// =========================
$sueldo_neto -= $isr_pagar;

                                            

                    } elseif ($tipo_nomina == "quincenal") {

                      
                                        if($horas_normales <= 0){


                                                    $consultar_quincena = "
                                                    SELECT d.codigo_emp, d.salario,d.sueldo_bruto, d.isr, n.fecha_ini, n.fecha_fin
                                                    FROM detalle_nomina d
                                                    INNER JOIN nomina n ON d.codigo_nom = n.codigo_nom
                                                   WHERE n.tipo_nomina = :tipo_nomina AND d.codigo_emp = :empleado_id
                                                    AND MONTH(n.fecha_ini) = MONTH(GETDATE())   -- mes actual
                                                    AND YEAR(n.fecha_ini) = YEAR(GETDATE())     -- año actual
                                                    AND DAY(n.fecha_ini) <= 15                  -- primera quincena
                                                    ;
                                                ";

                                                $stmt = $pdo->prepare($consultar_quincena);
                                                $stmt->execute([
                                                    ":empleado_id" => $id_empleado,
                                                    ":tipo_nomina" => $tipo_nomina
                                                ]);

                                                $primera_quincena = $stmt->fetch(PDO::FETCH_ASSOC);

                                                if ($primera_quincena) {
                                                    // Aquí tienes los datos de la primera quincena del mes actual
                                                    $salario_mensual = $primera_quincena['salario'];
                                                    $sueldo_q1 = $primera_quincena['sueldo_bruto'];
                                                    $isr_q1 = $primera_quincena['isr'];
                                                    
                                                    $sueldo_dia = $salario_base / $dias_trabajados_mes;
                                                        
                                                    $sueldo_hora = $sueldo_dia / $horas_por_dia;

                                              ///////////////////horas extras///////////////////////////////
                                                                    if (!empty($horas_extras) && $horas_extras > 0) {
                                                                        $horas_extras_pagar = $sueldo_hora * $valor_horas_extras * $horas_extras;
                                                                    }else{
                                                                        $horas_extras_pagar = 0;
                                                                    }
                                                                    if (!empty($horas_fin_semana) && $horas_fin_semana > 0) {
                                                                        $horas_fin_semana_pagar = $sueldo_hora * $valor_horas_fin_semana * $horas_fin_semana;
                                                                    }else{
                                                                        $horas_fin_semana_pagar = 0;
                                                                    }
                                                                    if (!empty($horas_extras_fin_semana) && $horas_extras_fin_semana > 0) {
                                                                        $horas_extra_fin_semana_pagar = $sueldo_hora * $valor_horas_extras_fin_semana * $horas_extras_fin_semana;
                                                                    }else{
                                                                        $horas_extra_fin_semana_pagar = 0;
                                                                    }
                                                                    if (!empty($horas_nocturnas) && $horas_nocturnas > 0) {
                                                                        $horas_nocturnas_pagar = $sueldo_hora * $valor_horas_nocturnas * $horas_nocturnas;
                                                                    }else{
                                                                        $horas_nocturnas_pagar = 0;
                                                                    }
                                                                    if (!empty($horas_extras_nocturnas) && $horas_extras_nocturnas > 0) {
                                                                        $horas_extras_nocturnas_pagar = $sueldo_hora * $valor_horas_extras_nocturnar * $horas_extras_nocturnas;
                                                                    }else{
                                                                        $horas_extras_nocturnas_pagar = 0;
                                                                    }
                                                                    if (!empty($horas_feriadas ) && $horas_feriadas  > 0) {
                                                                        $horas_feriadas_pagar = $sueldo_hora * $valor_horas_feriadas * $horas_feriadas;
                                                                    }else{
                                                                        $horas_feriadas_pagar = 0;
                                                                    }
                                                                    if (!empty($horas_extras_feriadas ) && $horas_extras_feriadas  > 0) {
                                                                        $horas_extras_feriadas_pagar = $sueldo_hora * $valor_horas_extras_feriadas * $horas_extras_feriadas;
                                                                    }else{
                                                                        $horas_extras_feriadas_pagar = 0;
                                                                    }
                                                                    if(!empty($horas_tardanza) && $horas_tardanza > 0){
                                                                        $horas_tardanza_descontar = $horas_tardanza * $sueldo_hora;
                                                                    }else{
                                                                        $horas_tardanza_descontar = 0;
                                                                    }
                                                                                        

                                                    ///////Calculos de nomina////////

                                                         
                                                            

                                                            $sueldot = $sueldo_dia * $dias_quincenales;
                                                             $sueldo_bruto = $sueldot + $horas_extras_pagar + $horas_fin_semana_pagar + $horas_extra_fin_semana_pagar + $horas_nocturnas_pagar + $horas_extras_nocturnas_pagar + $horas_feriadas_pagar + $horas_extras_feriadas_pagar;
                                            


                                                                $sueldo_mensual = $sueldo_q1 + $sueldo_bruto;
                                                              ////calculo IRS/////
                                                              if (!function_exists('calcularISR2025')) {
                                                                function calcularISR2025($sueldo_mensual) {
                                                                    if ($sueldo_mensual <= 34685.00) {
                                                                        return 0;
                                                                    } 
                                                                    elseif ($sueldo_mensual <= 52027.41) {
                                                                        return ($sueldo_mensual - 34685.00) * 0.15;
                                                                    } 
                                                                    elseif ($sueldo_mensual <= 72260.25) {
                                                                        return 2601.33 + ($sueldo_mensual - 52027.42) * 0.20;
                                                                    } 
                                                                    else {
                                                                        return 6648.00 + ($sueldo_mensual - 72260.26) * 0.25;
                                                                    }
                                                                }
                                                            }
                                                            
                                                            $isr_mensual_real = calcularISR2025($sueldo_mensual);
                                                            $isr_pagar = $isr_mensual_real - $isr_q1;
                                                            

                                                            $total_afp =  $sueldot * $afp;
                                                            $total_ars =$sueldot * $sfs;

                                                            $total_deducciones = $total_afp + $total_ars + $isr_pagar;

                                                            $sueldo_neto = $sueldo_bruto - $total_deducciones;

                                                                
                                                    // puedes usarlos para hacer el acumulado
                                                } else {
                                            ///////////////////////////Primera Quincena///////////////////////////////////////

                                            $sueldo_dia  = $salario_base / $dias_trabajados_mes;
                                            $sueldo_hora = $sueldo_dia / $horas_por_dia;

                                              ///////////////////horas extras///////////////////////////////
                                              if (!empty($horas_extras) && $horas_extras > 0) {
                                                $horas_extras_pagar = $sueldo_hora * $valor_horas_extras * $horas_extras;
                                            }else{
                                                $horas_extras_pagar = 0;
                                            }
                                            if (!empty($horas_fin_semana) && $horas_fin_semana > 0) {
                                                $horas_fin_semana_pagar = $sueldo_hora * $valor_horas_fin_semana * $horas_fin_semana;
                                            }else{
                                                $horas_fin_semana_pagar = 0;
                                            }
                                            if (!empty($horas_extras_fin_semana) && $horas_extras_fin_semana > 0) {
                                                $horas_extra_fin_semana_pagar = $sueldo_hora * $valor_horas_extras_fin_semana * $horas_extras_fin_semana;
                                            }else{
                                                $horas_extra_fin_semana_pagar = 0;
                                            }
                                            if (!empty($horas_nocturnas) && $horas_nocturnas > 0) {
                                                $horas_nocturnas_pagar = $sueldo_hora * $valor_horas_nocturnas * $horas_nocturnas;
                                            }else{
                                                $horas_nocturnas_pagar = 0;
                                            }
                                            if (!empty($horas_extras_nocturnas) && $horas_extras_nocturnas > 0) {
                                                $horas_extras_nocturnas_pagar = $sueldo_hora * $valor_horas_extras_nocturnar * $horas_extras_nocturnas;
                                            }else{
                                                $horas_extras_nocturnas_pagar = 0;
                                            }
                                            if (!empty($horas_feriadas ) && $horas_feriadas  > 0) {
                                                $horas_feriadas_pagar = $sueldo_hora * $valor_horas_feriadas * $horas_feriadas;
                                            }else{
                                                $horas_feriadas_pagar = 0;
                                            }
                                            if (!empty($horas_extras_feriadas ) && $horas_extras_feriadas  > 0) {
                                                $horas_extras_feriadas_pagar = $sueldo_hora * $valor_horas_extras_feriadas * $horas_extras_feriadas;
                                            }else{
                                                $horas_extras_feriadas_pagar = 0;
                                            }
                                            if(!empty($horas_tardanza) && $horas_tardanza > 0){
                                                $horas_tardanza_descontar = $horas_tardanza * $sueldo_hora;
                                            }else{
                                                $horas_tardanza_descontar = 0;
                                            }
                                                                

                                   ///////Calculos de nomina////////

                                            $sueldo_dia = $salario_base / $dias_trabajados_mes;
                                
                                            $sueldo_hora = $sueldo_dia / $horas_por_dia;

                                            $sueldot = $sueldo_dia * $dias_quincenales;
                                            $sueldo_bruto = $sueldot + $horas_extras_pagar + $horas_fin_semana_pagar + $horas_extra_fin_semana_pagar + $horas_nocturnas_pagar + $horas_extras_nocturnas_pagar + $horas_feriadas_pagar + $horas_extras_feriadas_pagar;
                                            $valores_extras = $horas_extras_pagar + $horas_fin_semana_pagar + $horas_extra_fin_semana_pagar + $horas_nocturnas_pagar + $horas_extras_nocturnas_pagar + $horas_feriadas_pagar + $horas_extras_feriadas_pagar;


                                        $sueldo_mensual = $salario_base  + $valores_extras;
                                      ////calculo IRS/////
                                      if (!function_exists('calcularISR')) {
                                        function calcularISR($sueldo_mensual) {
                                            // Escala ISR mensual 2025 (DGII)
                                            if ($sueldo_mensual <= 34685.00) {
                                                return 0; // Exento
                                            } 
                                            elseif ($sueldo_mensual <= 52027.41) {
                                                return ($sueldo_mensual - 34685.00) * 0.15;
                                            } 
                                            elseif ($sueldo_mensual <= 72260.25) {
                                                return 2601.33 + ($sueldo_mensual - 52027.42) * 0.20;
                                            } 
                                            else {
                                                return 6648.00 + ($sueldo_mensual - 72260.26) * 0.25;
                                            }
                                        }
                                    }
                                    
                                    
                                    $sueldo_mensual = $salario_base + $valores_extras;
                                    $isr_mensual_real = calcularISR($sueldo_mensual);
                                    $isr_pagar =    $isr_mensual_real / 2;

                                    $total_afp =  $sueldot * $afp;
                                    $total_ars = $sueldot * $sfs;

                                    $total_deducciones = $total_afp + $total_ars + $isr_pagar;

                                    $sueldo_neto = $sueldo_bruto - $total_deducciones;
                                                }

                                              





                                        }else{

                                        
                                            
                                        }
                       





                    } elseif ($tipo_nomina == "mensual") {
                        $sueldo_dia  = $salario_base / $dias_trabajados_mes;
                        $sueldo_hora = $sueldo_dia / $horas_por_dia;

                        $sueldo_bruto = $sueldo_hora * $horas_normales;

                        $afp = 15;
                        $ars = 20;

                    }

                    $irs = 0; // aquí deberías aplicar tu lógica de impuestos

                    // Acumular totales
                    $total_nomina        += $sueldo_neto;
                    $horas_normales_pagas += $horas_normales;
                    $horas_extras_pagas  += $horas_extras;
                    $horas_nocturnas_pagas += $horas_nocturnas;
                    $horas_extras_nocturnas_pagas += $horas_extras_nocturnas;
                    $horas_fin_semana_pagas += $horas_fin_semana;
                    $horas_extras_fin_semana_pagas += $horas_extras_fin_semana;
                    $horas_feriadas_pagas += $horas_feriadas;
                    $horas_extras_feriadas_pagas += $horas_extras_feriadas;


                    $total_horas_normales_pagas += $horas_normales;
                    $total_horas_extras_pagas += $horas_extras_pagar;
                    $total_horas_nocturnas_pagas += $horas_nocturnas_pagar;
                    $total_horas_extras_nocturnas_pagas += $horas_extras_nocturnas_pagar;
                    $total_horas_fin_semana_pagas += $horas_fin_semana_pagar;
                    $total_horas_extras_fin_semanas_pagas += $horas_extra_fin_semana_pagar;
                    $total_horas_feriadas_pagas += $horas_feriadas_pagar;
                    $total_horas_extras_feriadas_pagas += $horas_extras_feriadas_pagar;

                    $total_afp_pago += $total_afp;
                    $total_ars_pago += $total_ars;
                    $total_isr_pago += $isr_pagar;

                    $insert_detalle = "INSERT INTO detalle_nomina 
                    (codigo_nom, codigo_emp, nombre_emp, departamento, salario,
                     horas_normales, horas_extras, horas_nocturnas, horas_extras_nocturnas,
                     horas_fin_semana, horas_extras_fin_semana, horas_feriadas, horas_extras_feriadas,
                     total_horas_normales, total_horas_extras, total_horas_nocturnas, total_horas_extras_nocturnas,
                     total_horas_fin_semana, total_horas_extras_fin_semana, total_horas_feriadas, total_horas_extras_feriadas,
                     afp, ars,isr, total_pago,sueldo_bruto,horas_descuento) 
                VALUES 
                    (:codigo_nom, :codigo_emp, :nombre_emp, :departamento, :salario,
                     :horas_normales, :horas_extras, :horas_nocturnas, :horas_extras_nocturnas,
                     :horas_fin_semana, :horas_extras_fin_semana, :horas_feriadas, :horas_extras_feriadas,
                     :total_horas_normales, :total_horas_extras, :total_horas_nocturnas, :total_horas_extras_nocturnas,
                     :total_horas_fin_semana, :total_horas_extras_fin_semana, :total_horas_feriadas, :total_horas_extras_feriadas,
                     :afp, :ars,:isr, :total_pago,:sueldo_bruto,:horas_descuento)";
                
                $stmt_det = $pdo->prepare($insert_detalle);
                
                $stmt_det->execute([
                    ":codigo_nom" => $codigo_nom,
                    ":codigo_emp" => $id_empleado,
                    ":nombre_emp" => $nombre_emp,
                    ":departamento" => $departamento,
                    ":salario" => $salario_base,
                    ":horas_normales" => $horas_normales,
                    ":horas_extras" => $horas_extras,
                    ":horas_nocturnas" => $horas_nocturnas,
                    ":horas_extras_nocturnas" => $horas_extras_nocturnas,
                    ":horas_fin_semana" => $horas_fin_semana,
                    ":horas_extras_fin_semana" => $horas_extras_fin_semana,
                    ":horas_feriadas" => $horas_feriadas,
                    ":horas_extras_feriadas" => $horas_extras_feriadas,
                    ":total_horas_normales" => $sueldot,
                    ":total_horas_extras" => $horas_extras_pagar,
                    ":total_horas_nocturnas" => $horas_nocturnas_pagar,
                    ":total_horas_extras_nocturnas" => $horas_extras_nocturnas_pagar,
                    ":total_horas_fin_semana" => $horas_fin_semana_pagar,
                    ":total_horas_extras_fin_semana" => $horas_extra_fin_semana_pagar,
                    ":total_horas_feriadas" => $horas_feriadas_pagar,
                    ":total_horas_extras_feriadas" => $horas_extras_feriadas_pagar,
                    ":afp" => $total_afp,
                    ":ars" => $total_ars,
                    ":isr" => $isr_pagar,
                    ":total_pago" => $sueldo_neto,
                    ":sueldo_bruto"=> $sueldo_bruto,
                    ":horas_descuento"=> $horas_faltantes_a_pagar
                ]);
                
                }

                // Insertar encabezado de nómina (solo una vez)
                $insert_nomina = "INSERT INTO nomina 
                    (codigo_nom, detalle, fecha_ini, fecha_fin, fecha_pago, tipo_nomina,
                     horas_normales_pagas, horas_extras_pagas,horas_nocturnas_pagas,horas_extras_nocturnas_pagas,horas_fin_semana_pagas,horas_extras_fin_semana_pagas,
                     horas_feriadas_pagas,horas_extras_feriadas_pagas,total_horas_normales_pagas,total_horas_extras_pagas,total_horas_nocturnas_pagas,total_horas_extras_nocturnas_pagas,
                     total_horas_fin_semana_pagas,total_horas_extras_fin_semana_pagas,total_horas_feriadas_pagas, total_horas_extras_feriadas_pagas,afp, ars, irs, deducciones_pagas, sueldo_pago) 
                    VALUES 
                    (:codigo_nom, :detalle, :fecha_ini, :fecha_fin, :fecha_pago, :tipo_nomina,
                     :horas_normales_pagas, :horas_extras_pagas,:horas_nocturnas_pagas,:horas_extras_nocturnas_pagas,:horas_fin_semana_pagas,:horas_extras_fin_semana_pagas,
                     :horas_feriadas_pagas,:horas_extras_feriadas_pagas,:total_horas_normales_pagas,:total_horas_extras_pagas,:total_horas_nocturnas_pagas,:total_horas_extras_nocturnas_pagas,
                     :total_horas_fin_semana_pagas,:total_horas_extras_fin_semana_pagas,:total_horas_feriadas_pagas,:total_horas_extras_feriadas_pagas,:afp, :ars, :irs, :deducciones_pagas, :sueldo_pago)";
                $stmt_nom = $pdo->prepare($insert_nomina);
                $stmt_nom->execute([
                    ":codigo_nom"           => $codigo_nom,
                    ":detalle"              => $detalle,
                    ":fecha_ini"            => $fecha_ini,
                    ":fecha_fin"            => $fecha_fin,
                    ":fecha_pago"           => $fecha_pago,
                    ":tipo_nomina"          => $tipo_nomina,
                    ":horas_normales_pagas" => $horas_normales_pagas,
                    ":horas_extras_pagas"   => $horas_extras_pagas,
                    ":horas_nocturnas_pagas"=> $horas_nocturnas_pagas,
                    ":horas_extras_nocturnas_pagas"=> $horas_extras_nocturnas_pagas,
                    ":horas_fin_semana_pagas"=> $horas_fin_semana_pagas,
                    ":horas_extras_fin_semana_pagas" => $horas_extras_fin_semana_pagas,
                    ":horas_feriadas_pagas" => $horas_feriadas_pagas,
                    ":horas_extras_feriadas_pagas"=> $horas_extras_feriadas_pagas,
                    ":total_horas_normales_pagas"=> $total_horas_normales_pagas,
                    ":total_horas_extras_pagas" => $total_horas_extras_pagas,
                    ":total_horas_nocturnas_pagas"=>$total_horas_nocturnas_pagas,
                    ":total_horas_extras_nocturnas_pagas"=>$total_horas_extras_nocturnas_pagas,
                    ":total_horas_fin_semana_pagas"=>$total_horas_fin_semana_pagas,
                    ":total_horas_extras_fin_semana_pagas"=>$total_horas_extras_fin_semanas_pagas,
                    ":total_horas_feriadas_pagas"=> $total_horas_feriadas_pagas,
                    ":total_horas_extras_feriadas_pagas"=> $total_horas_extras_feriadas_pagas,
                    ":afp"                  => $total_afp_pago ,
                    ":ars"                  =>  $total_ars_pago,
                    ":irs"                  => $total_isr_pago,
                    ":deducciones_pagas"    => $irs,
                    ":sueldo_pago"          => $total_nomina
                ]);

                $pdo->commit();
                echo "✅ Nómina generada con éxito";

            } catch (Exception $e) {
                $pdo->rollBack();
                echo "❌ Error al generar nómina: " . $e->getMessage();
            }
        } else {
            echo "⚠️ No se encontraron empleados";
        }
    } else {
        echo "⚠️ La nómina ya existe";
    }

  
    
}
?>
