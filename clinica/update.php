<?php include("seguridad.php"); ?>
<?php
	if (isset($_GET['SEG3'])){
		$SEG3=strval($_GET['SEG3']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inteligencia de Negocio | Policlínica Táchira</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Metas</b></h2></div>
                    <div class="col-sm-4">
                        <a href="principal.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
			<?php                                     // actualizao el campo indicado por el usuario
			    include ("database.php");
				$clientes= new Database();
				if(isset($_POST) && !empty($_POST))
				{ 
				if(ctype_digit($_POST['META_CASOS']) and ctype_digit($_POST['META_INGRESOS']))    //valida que sea un valor numerico valido
					{
					$META_CASOS=intval($_POST['META_CASOS']);
					$META_INGRESOS=intval($_POST['META_INGRESOS']);
					$META_CASOS=$META_CASOS/100;
					$META_INGRESOS=$META_INGRESOS/100;
					$res = $clientes->update($META_CASOS,$META_INGRESOS,$SEG3);
					if($res)
					{
						$message= "Datos actualizados con éxito ";
						$class="alert alert-success";
						
					}else
					{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
				}	
				else
				{
				$message="Por Favor Ingresar Datos Numericos Validos 0 - 999";
				$class="alert alert-danger";		
				}	
			?>
				<div class="<?php echo $class?>">
					<?php echo $message;?>
				</div>	
			<?php		
				}					
				$registro=$clientes->single_record($SEG3);            //busca el campo enviado por el metodo GET
				if( sqlsrv_fetch( $registro ) === false) 
				{
					die( print_r( sqlsrv_errors(), true));
				}
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-3">
					<label>Segmento:</label>
					<input type="text" name="SEG3" id="SEG3" class='form-control' maxlength="4" disabled  value="<?php echo sqlsrv_get_field( $registro, 0);?>">
				</div>
				<div class="col-md-6">
					<label>Unidad de Negocio:</label>
					<input type="text" name="DESCRIPCION" id="DESCRIPCION" class='form-control' maxlength="20" disabled value="<?php echo sqlsrv_get_field( $registro, 1);?>">
				</div>
				<div class="col-md-2">
					<label>Abreviatura:</label>
					<input type="text" name="DESCR" id="DESCR" class='form-control' maxlength="10" disabled value="<?php echo sqlsrv_get_field( $registro, 2);?>">
				</div>
				<div class="col-md-4">
					<label>	Meta Casuística en %:</label>
					<input type="text" name="META_CASOS" id="META_CASOS" class='form-control' maxlength="4" required value="<?php echo sqlsrv_get_field( $registro, 3)*100;?>">
				</div>
				<div class="col-md-4">
					<label>	Meta Ingresos en %:</label>
					<input type="text" name="META_INGRESOS" id="META_INGRESOS" class='form-control' maxlength="4" required value="<?php echo sqlsrv_get_field( $registro, 4)*100;?>">
				</div>
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>