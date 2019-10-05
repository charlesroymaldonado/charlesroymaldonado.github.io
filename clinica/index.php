<?php @session_start(); ?>
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
</head>
<body>
	<form method="post" action="control.php"><br>
	<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12"><h2>Ingreso  <b>Inteligencia de Negocio</b></h2>
					</div>
				<div class="col-md-3">
					<label>	Usuario:</label>
					<input type="text" name="usuario" id="usuario" class='form-control' maxlength="30" required >
				</div>
			<div class="col-md-3">
					<label>	Clave:</label>
					<input type="password" name="clave" id="clave" class='form-control' maxlength="30" required >
			</div>
			</div>
				<hr>
					<button type="submit" class="btn btn-success">Ingresar</button>
			</div>	
				</div>		
		    </div>
		</div> 
	</div>
	</form>
</body>
</html>
<?php exit(); ?>
