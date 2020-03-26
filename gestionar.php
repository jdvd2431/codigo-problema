<?php 
session_start();
if (isset($_SESSION['usuario'])) {
    
}else {
    header('location:http://localhost/proyecto/html/validacion%20login.php');
}
   
try {
    $conexion = new PDO('mysql:host=localhost;dbname=conjunto_residencial','root', '');
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/806eeb58d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Proyecto/html/cuentas/consultar_c/gestionar/gestionar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    

    <title>Gestionar</title>
</head>
<body>
<header>
          
    <div class="contenedor">
	  <header>
            <div class="regresar">
            <a class="btn" href="http://localhost/proyecto/html/cuentas/validacion%20cuenta.php"><i class="icono fas fa-angle-left"></i></a >
            </div>
            <h1>Tabla de cuentas</h1 style="text_align:center;">   
	   </header>
		<main>
            
        <table id="example" class="display" style="width:100%">
         <thead>
             <tr>
					<th>Codigo</th>
                    <th>Id Cuenta</th>
                    <th>Fecha Pago</th>
					<th>Vencimiento de Pago</th>
					<th>Valor a Pagar</th>
                    <th>Periodo de Cuenta</th>
                    <th>Estado de Cuenta</th>
                    <th>Registro de Residente</th>
                    <th>Opciones   </th>
                    <th>Opciones   </th>
                    
                </tr>
        </thead>
        </tbody>
				
                <?php 
                $query="SELECT `id`, `id_cuenta`, `fecha_de_pago`, `fecha_de_vencimiento de pago`, `valor_a_pagar`, `periodo_de_cuenta`, `estado_de_cuenta`, `registro_de_residente`FROM `cuenta` WHERE 1";
                
                $consulta=$conexion->query($query);
                
                while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    echo '
                <tr>
                
                      <td>'.$fila['id'].'</td>
                      <td>'.$fila['id_cuenta'].'</td>
                      <td>'.$fila['fecha_de_pago'].'</td>
                      <td>'.$fila['fecha_de_vencimiento de pago'].'</td>
                      <td>'.$fila['valor_a_pagar'].'</td>
                      <td>'.$fila['periodo_de_cuenta'].'</td>
                      <td>'.$fila['estado_de_cuenta'].'</td>
                      <td>'.$fila['registro_de_residente'].'</td>
                      <td><a class="gestionarm" href="modificar.php?id='.$fila['id'].'">Modificar</td>
                      <td><a class="gestionar"  href="#">Eliminar</td>
                 
                    
                      
                </tr> ';
                

                }
                ?>
                
        </tbody>
	</table>

		</main>
	</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script >
    var id = "";
    $(document).ready(function() {
    var table = $('#example').DataTable();
    
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            id = document.getElementsByClassName('selected')[0].getElementsByTagName('td')[0].innerText;
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
    </script>
</body>
</html>