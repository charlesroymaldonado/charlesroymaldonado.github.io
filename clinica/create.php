<?php include("seguridad.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inteligencia de Negocio | Policlínica Táchira </title>
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
                    <div class="col-sm-6"><h2>Indicar  <b>Porcentajes</b></h2></div>
                    <div class="col-sm-4">
                        <a href="principal.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
					</div>
				</div>
			<!--proceso de actualizar porcentajes en lote-->
			<?php
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
						$res = $clientes->update_todos($META_CASOS,$META_INGRESOS);
						if($res)
						{
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
						}else
						{
						$message="No se pudieron insertar los datos";
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
			?>				
		<div class="row">
				<form method="post">
				<div class="col-md-3">
					<label>	Meta Casuística en %:</label>
					<input type="text" name="META_CASOS" id="META_CASOS" class='form-control' placeholder="Datos Numericos Validos 0-999" maxlength="4" required >
				</div>
				<div class="col-md-3">
					<label>Meta Ingresos en %:</label>
					<input type="text" name="META_INGRESOS" id="META_INGRESOS" class='form-control' placeholder="Datos Numericos Validos 0-999" maxlength="4" required >
				</div>
				</div>
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>				
				</form>
			</div>
		</div>
    </div>     
</body>
</html>