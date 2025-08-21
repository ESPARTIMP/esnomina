<?php
require_once(__DIR__."/funciones/conexion.php");

$verificar = $_GET['consulta'];


if($verificar == 'agregar_nomina'){

    $codigo_nom   = $_POST['codigo_nom'];
    $detalle      = $_POST['detalle'];
    $fecha_ini    = $_POST['fecha_ini'];
    $fecha_fin    = $_POST['fecha_fin'];
    $fecha_pago   = $_POST['fecha_pago'];
    $tipo_nomina  = $_POST['tipo_nomina'];

//Datos de configuracion
    $horas_por_dia = 8;
    $horas_semanales = 44;
    $dias_trabajados_mes = 22;

//horas de tabla de Bioespart
    $horas_normales = 44;
    $horas_extras = 10;
    $horas_fin_semana = 10;
    $horas_extras_fin_semana = 10;
    $horas_nocturnar = 10;
    $horas_extras_nocturnas = 10;
    $horas_feriadas = 10;
    $horas_extras_feriadas = 10;


    // Verificar si la nómina ya existe
    $consultar_nomina = "SELECT * FROM nomina WHERE codigo_nom = :codigo_nom";
    $stmt= $pdo->prepare($consultar_nomina);
    $stmt->execute([":codigo_nom" => $codigo_nom]);

    if($stmt->rowCount() == 0){

        // Buscar empleados de ese tipo de nómina
        $consultar_empleados = "SELECT * FROM empleados WHERE tipo_nomina = :tipo_nomina";
        $stmt_empleados = $pdo->prepare($consultar_empleados);
        $stmt_empleados->execute([":tipo_nomina" => $tipo_nomina]);

        if($stmt_empleados->rowCount() > 0){

            $empleados = $stmt_empleados->fetchAll(PDO::FETCH_ASSOC);
            $total_nomina = 0;

            foreach($empleados as $emp){
                $id_empleado = $emp['codigo'];
                $nombre_emp = $emp['nombre'];
                $salario_base = $emp['sueldo_men'];
                $departamento = $emp['departamento'];
                 // asegúrate que en la tabla empleados exista esta columna

                // Calcular sueldo según el tipo de nómina
                if($tipo_nomina == "semanal"){

                    $sueldo_dia = $sueldo/$dias_trabajados_mes;
                    $sueldo_hora = $sueldo_dia/$horas_por_dia;


                    $sueldo_bruto = $sueldo_hora * $horas_normales;

                    if (!empty($horas_extras) && $horas_extras > 0) {
                        $horas_extras_pagar = $sueldo_hora * 1.25 * $horas_extras;
                    }
                    
                    $sueldo_neto = $sueldo_bruto + $horas_extras_pagar;
                    $afp = 15;
                    $ars = 20;






                }elseif($tipo_nomina == "quincenal"){
                    $sueldo = $salario_base / 2;
                }elseif($tipo_nomina == "mensual"){
                    $sueldo = $salario_base;
                }else{
                    $sueldo = 0;
                }

                // Insertar detalle de nómina
                $insert_detalle = "INSERT INTO detalle_nomina (codigo_nom, codigo_emp,nombre_emp,departamento, salario, horas_normales, horas_extras,afp,ars,total_pago) 
                                   VALUES (:codigo_nom, :codigo_emp,:nombre_emp,:departamento, :salario, :horas_normales, :horas_extras,:afp,:ars,:total_pago)";
                $stmt_det = $pdo->prepare($insert_detalle);
                $stmt_det->execute([
                    ":codigo_nom" => $codigo_nom,
                    ":codigo_emp" => $id_empleado,
                    ":nombre_emp" => $nombre_emp,
                    ":departamento" =>$departamento,
                    ":salario" => $sueldo,
                    ":horas_normales"=>$horas_normales,
                    ":horas_extras"=>$horas_extras,
                    ":afp"=>$afp,
                    ":ars"=>$ars,
                    ":total_pago"=>$sueldo_neto
                    
                ]);

                $total_nomina += $sueldo_neto;
            }

            // Insertar encabezado de nómina
            $insert_nomina = "INSERT INTO nomina (codigo_nom, detalle, fecha_ini, fecha_fin, fecha_pago, tipo_nomina,horas_normales_pagas,horas_extras_pagas,afp,ars,irs,deducciones_pagas,sueldo_pago) 
                              VALUES (:codigo_nom, :detalle, :fecha_ini, :fecha_fin, :fecha_pago, :tipo_nomina,:horas_normales_pagas,:horas_extras_pagas,:afp,:ars,:irs,:deducciones_pagas,:sueldo_pago)";
            $stmt_nom = $pdo->prepare($insert_nomina);
            $stmt_nom->execute([
                ":codigo_nom" => $codigo_nom,
                ":detalle" => $detalle,
                ":fecha_ini" => $fecha_ini,
                ":fecha_fin" => $fecha_fin,
                ":fecha_pago" => $fecha_pago,
                ":tipo_nomina" => $tipo_nomina,
                ":horas_normales_pagas" => $sueldo_bruto,
                ":horas_extras_pagas" => $horas_extras_pagar,
                ":afp"=>$afp,
                ":ars"=>$ars,
                ":irs"=>$irs,
                ":deducciones_pagas"=>$irs,
                ":sueldo_pago"=>$total_nomina
                
            ]);

            echo "✅ Nómina generada con éxito";

        }else{
            echo "⚠️ No se encontraron empleados para este tipo de nómina";
        }

    }else{
        echo "⚠️ La nómina ya existe";
    }
}
?>
