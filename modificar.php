<?php


$consulta = ConsultarCuenta($_GET["id"]);
function ConsultarCuenta($id){
    include 'conexion.php';
    $sentencia ="SELECT * FROM cuenta WHERE id='$id'";
    $resultado = $conexion->query($sentencia);
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);
    return [
        $fila['id'],
        $fila['id_cuenta'],
        $fila['fecha_de_pago'],
        $fila['fecha_de_vencimiento de pago'],
        $fila['valor_a_pagar'],
        $fila['periodo_de_cuenta'],
        $fila['estado_de_cuenta'],
        $fila['registro_de_residente']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/806eeb58d6.js" crossorigin="anonymous"></script>
   <!-- <link rel="stylesheet" type="text/css" href="C:\Users\Estudiante\Desktop\login proyecto\css\cuentas.css">-->
   <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/cuentas.css">
   <link rel="shorcut icon" type="image/x-icon" href="favicon.ico">
    <title>Cuentas de Cobro</title>
</head>
<body>
    <form action="modificar2.php?>" method="POST">
        <div class"regresar">
            <a class="btn" href="http://localhost/proyecto/html/menu.php"><i class="icono fas fa-angle-left"></i></a > 
            <header>
			
			 
		</header>
        </div>
       
    <div>
        <h4>Cuenta de Cobro</h4>

    <?php if (!empty($errores)):  ?>
         <div class="alert error">
         <?php echo $errores; ?>	
     </div>
           <?php endif ?>

    </div>                     
      <?php if (!empty($succes)):?>
      <div class="alert succes">
      <?php echo $succes;?>
      </div>
        <?php endif ?>
        
 <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <div>
        Id de Cuenta<input type="text" name="cuenta" value="<?php echo $consulta[1]; ?>" placeholder="id de cuenta">
        </div>
        <div>
            Fecha de Pago<input type="date" name="fecha" value="<?php echo $consulta[2]; ?>"   placeholder="fecha de pago">
            </div>
           
            <div>
                Fecha de Vencimiento de Pago<input type="date" name="fechavencimieto" value="<?php echo $consulta[3]; ?>" placeholder="Fecha de Vencimiento" >
                </div>
                <div>
                    Valor a Pagar<input type="text"name="valorpagar" value="<?php echo $consulta[4]; ?>" placeholder="Valor a Pagar" >
                    </div>
                    <div>
                        Periodo de Cuenta<input type="text" name="periodocuenta" value="<?php echo $consulta[5]; ?>" placeholder="Periodo de Cuenta">
                        </div>
                        <div>
                            <select name="estadocuenta"  id="">
                                <option value="activo"><?php if ($consulta[6]== 'activo')  {
                                    echo 'activo';
                                }  ?>Activo</option>
                                <option value="inactivo"><?php if ($consulta[6]== 'Inactivo')  {
                                    echo 'Inactivo';
                                }  ?>Inactivo</option>
                            </select>
                            </div>
                            <div>
                                Registro de Residente<input type="search"name="registroresidente" value="<?php echo $consulta[7]; ?>" placeholder=" Registro de Residente">
                                </div>
                                
                                <input type="submit" name="Enviar" value="Modificar">
                             

    </form>
</body>
</html>