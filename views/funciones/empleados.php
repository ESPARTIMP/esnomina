<?php
require_once(__DIR__ . "/../conexion/conexion.php");


$verificar = $_GET['consulta'];


if($verificar == 'ingresar_empleados'){

                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $codigo = $_POST['codigo'];
                        $cedula = $_POST['cedula'];
                        $nombre = $_POST['nombre'];
                        $apellidos = $_POST['apellidos'];
                        $sexo = $_POST['sexo'];
                        $fecha_na = $_POST['fecha_na'];
                        $lugar_na = $_POST['lugar_na'];
                        $direccion = $_POST['direccion'];
                        $telefono = $_POST['telefono'];
                        $email = $_POST['email'];
                        $situacion = $_POST[''];
                        $fecha_ing = $_POST['fecha_ing'];
                        $tipo_cobro = $_POST[''];
                        $banco = $_POST['banco'];
                        $numero_cuen = $_POST['numero_cuen'];
                        $tipo_cont = $_POST['tipo_cont'];
                        $sueldo_men = $_POST['sueldo_men'];
                        $nomina = $_POST['nomina'];
                        $departamento = $_POST['departamento'];
                        $cargo = $_POST[''];
                        $observacion = $_POST['observacion'];
                        $foto = $_POST[''];
                        $id_usuario_crea = $_POST['usuario_crea'];
                        $fecha_crea = date("Y-m-d H:i:s");

                                            try {
                                                // 1. Verificar si ya existe el empleado
                                                $consultar_empleado = "SELECT * FROM empleados WHERE codigo = :codigo OR cedula = :cedula";
                                                $stmt = $pdo->prepare($consultar_empleado);
                                                $stmt->execute([
                                                    ':codigo' => $codigo,
                                                    ':cedula' => $cedula
                                                ]);

                                                if ($stmt->rowCount() == 0) {
                                                    // 2. Insertar empleado porque no existe
                                                    $sql = "INSERT INTO empleados 
                                                        (codigo, cedula, nombre, apellidos, sexo, fecha_na, lugar_na, direccion, telefono, email, situacion, fecha_ing, tipo_cobro,
                                                        banco, numero_cuen, tipo_cont, sueldo_men, nomina, departamento, cargo, observacion, foto, id_usuario_crea, fecha_crea)  
                                                        VALUES 
                                                        (:codigo, :cedula, :nombre, :apellidos, :sexo, :fecha_na, :lugar_na, :direccion, :telefono, :email, :situacion, :fecha_ing, :tipo_cobro,
                                                        :banco, :numero_cuen, :tipo_cont, :sueldo_men, :nomina, :departamento, :cargo, :observacion, :foto, :id_usuario_crea, :fecha_crea)";

                                                    $stmt = $pdo->prepare($sql);

                                                    $stmt->execute([
                                                        ':codigo' => $codigo,
                                                        ':cedula' => $cedula,
                                                        ':nombre' => $nombre,
                                                        ':apellidos' => $apellidos,
                                                        ':sexo' => $sexo,
                                                        ':fecha_na' => $fecha_na,
                                                        ':lugar_na' => $lugar_na,
                                                        ':direccion' => $direccion,
                                                        ':telefono' => $telefono,
                                                        ':email' => $email,
                                                        ':situacion' => $situacion,
                                                        ':fecha_ing' => $fecha_ing,
                                                        ':tipo_cobro' => $tipo_cobro,
                                                        ':banco' => $banco,
                                                        ':numero_cuen' => $numero_cuen,
                                                        ':tipo_cont' => $tipo_cont,
                                                        ':sueldo_men' => $sueldo_men,
                                                        ':nomina' => $nomina,
                                                        ':departamento' => $departamento,
                                                        ':cargo' => $cargo,
                                                        ':observacion' => $observacion,
                                                        ':foto' => $foto,
                                                        ':id_usuario_crea' => $id_usuario_crea,
                                                        ':fecha_crea' => $fecha_crea
                                                    ]);

                                                    echo " Empleado agregado correctamente";
                                                } else {
                                                    echo " El empleado ya existe con ese código o cédula";
                                                }
                                            } catch (PDOException $e) {
                                                echo " Error al insertar empleado: " . $e->getMessage();
                                            }
                    }


}


if($verificar == 'actualizar_empleados'){


}
if($verificar == 'eliminar_empleados'){

    
}

////////////////////Departamentos///////////////////////////////////


if($verificar == 'ingresar_departamento'){

                if($_SERVER['REQUEST_METHOD'] == "POST"){
                        $codigo = $_POST['codigo'];
                        $departamento = $_POST['departamento'];
                        $departamento_sup = $_POST['departamento_sup'];


                                try{

                                            $consultar_departamento = "SELECT * FROM departamento where codigo = :codigo";
                                            $stmt= $pdo->prepare($consultar_departamento);

                                                $stmt->execute([
                                                    ":codigo" => $codigo

                                                ]);

                                                        if($stmt->rowCount()== 0 ){

                                                                $insertar_departamento ="INSERT INTO departamento(codigo,departamento,departamento_sup) VALUES(:codigo,:departamento,:departamento_sup)";
                                                                $stmt= $pdo->prepare($insertar_departamento);

                                                                $stmt->execute([
                                                               ":codigo"=>$codigo,
                                                               ":departamento"=> $departamento,
                                                               ":departamento_sup" => $departamento_sup
                                                                
                                                                
                                                                
                                                                ]);
                                                                echo"Departamentos Registrados con exito";

                                                        }else{

                                                            echo"El departamento ya existe";
                                                        }

                                }catch(PDOException $e){
                                    echo"error al insertar departamento";

                                }


                }
    
}
if($verificar == 'actualizar_departamento'){

    
}

if($verificar == 'eliminar_departamento'){

    
}


///////////////////////////Cargos////////////////////////////////
if($verificar == 'ingresar_cargos'){

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $codigo = $_POST['codigo'];
        $cargo = $_POST['cargo'];
        $cargo_sup = $_POST['cargo_sup'];

            //    try{

                    $consultar_cargos = "SELECT * FROM cargos WHERE codigo = :codigo";
                    $stmt= $pdo->prepare($consultar_cargos);

                    $stmt->execute([
                        ":codigo"=>$codigo
                    ]);

                        if($stmt->rowCount() == 0){
                            /////Aqui va el insert
                        }
                }

}
    
//}


if($verificar == 'actualizar_cargos'){

    
}
if($verificar == 'eliminar_cargos'){

    
}
?>
