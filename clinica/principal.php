<?php include("seguridad.php"); 
if($_SESSION["grupodirectory"] != "WEB")
	{
	echo"<script> alert('Usuario no autorizado para este proceso.'); window.location.href='inicio.php'; </script>";
	exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Policlínica Táchira | Inteligencia de Negocio</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- barra de navegacion-->
   <?php include("barra_menu.php"); ?>
<!-- barra de navegacion-->
</head>

<?php 
include ('database.php');
$clientes = new Database();
$listado=$clientes->read();
?>

<body>
<div class="container">
<div class="row">
  <div class="col">    
  <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>prueba</th>
                    </tr>
                </thead>
  </table>			
   </div> 
</div>    
<div class="row">
        <div class="table table-striped">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Parametros</b></h2></div>
                    <div class="col-sm-4">
					    <br>
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i>Actualizar en Lote</a>
                    </div>
                </div>
            </div>
	<form action="principal.php" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Segmento</th>   
                        <th>Unidad de Negocio</th>
                        <th>Abreviatura</th>
						<th>Meta Casuística en %</th>
                        <th>Meta Ingresos en %</th>
                    </tr>
                </thead>
                 
                <tbody>    
			<?php	                            //caso por actualizar si viene de post de index con datos existente
				if(isset($_POST) && !empty($_POST))
				{
				$p=0;					
				while(list($nombre,$valor)=each($_POST))
				{
					$SEG3=$valor;
					if(list($nombre,$valor)=each($_POST))
					{
						if(!ctype_digit($valor))
						{
						$message="Los Caracteres Ingresados Serán Tomados como Valor \"0\" Por Favor Ingresar Datos Numericos Validos 0 - 999";
						$class="alert alert-danger";
						$p=1;
						}
						$META_CASOS=intval($valor);
					}	
					if(list($nombre,$valor)=each($_POST))
					{
						$META_INGRESOS=intval($valor);
						if(!ctype_digit($valor))
						{
						$message="Los Caracteres Ingresados Serán Tomados como Valor \"0\" Por Favor Ingresar Datos Numericos Validos 0 - 999";
						$class="alert alert-danger";
						$p=1;
						}
					}
						$META_CASOS=$META_CASOS/100;
						$META_INGRESOS=$META_INGRESOS/100;
						$res = $clientes->update($META_CASOS,$META_INGRESOS,$SEG3);		
				}  //FIN DEL WHILE
				if($res and $p==0)
						{
						$message= "Datos actualizados con éxito ";
						$class="alert alert-success";
						}
						else
						if($p==0)
						{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
						}
				?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
			    <?php
				$listado=$clientes->read();
				} //fin del if del POST					
			?>
			
                  <?php                                             //lista todo lo que esta en la tabla
					 $i=0;
					 while( $fila = sqlsrv_fetch_array( $listado, SQLSRV_FETCH_ASSOC) ) 
					 {
						$SEG3=$fila['SEG3'];
						$DESCRIPCION=$fila['DESCRIPCION'];
						$DESCR=$fila['DESCR'];
						$META_CASOS=$fila['META_CASOS']*100;
						$META_INGRESOS=$fila['META_INGRESOS']*100;
						$i++;			
					?>
			
					<tr>
   				    <td><input type="text" name="<?php echo "SEG3_".$i;?>" id="<?php echo "SEG3_".$i;?>" class='form-control' maxlength="4"  style="display:none" value="<?php echo $SEG3;?>"><?php echo $SEG3;?></td>
					<td><?php echo $DESCRIPCION;?></td>
					<td><?php echo $DESCR;?></td>
					<td><input type="text" name="<?php echo "M_C".$i;?>" id="<?php echo "M_C".$i;?>" class='form-control' maxlength="4" required value="<?php echo $META_CASOS;?>"></td>
					<td><input type="text" name="<?php echo "M_I".$i;?>" id="<?php echo "M_I".$i;?>" class='form-control' maxlength="4" required value="<?php echo $META_INGRESOS;?>"></td>
					</tr>	
					<?php
					} //fin del while  
					?>     
                </tbody>
            </table>
			<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar Cambios</button>
			</div>
	</form>
        </div>
   </div> 		
 </div>     
</body>
</html>
<?php exit(); ?>