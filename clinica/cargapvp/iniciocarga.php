<?php include("../seguridad.php"); 
if($_SESSION["grupodirectory"] != "WEB")
	{
	echo"<script> alert('Usuario no autorizado para este proceso.'); window.location.href='../inicio.php'; </script>";
	exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Policlínica Táchira | Inteligencia de Negocio</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- barra de navegacion-->
   <?php include("menu_carga.php"); ?>
<!-- barra de navegacion-->
</head>
<body>	
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-1" >
  </div>
   <div class="col-sm-6 " >
    <h1>Carga inicial de precios</h1>
    <p>El procedimiento que realizará implica la carga inicial de precios de su unidad de negocio, todos los datos almacenados en cargas anteriores serán <b>"eliminados"</b></p>
   <form action="#" method="post" enctype="multipart/form-data">
     <h5>Cargar Archivo:</h5>
     <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="customFile" name="filename">
      <label class="custom-file-label" for="customFile">Seleccione un archivo</label>
     </div>
	 <input type="text" name="nomarchivo" id="nomarchivo" class='form-control' maxlength="100"  style="display:none" value="pru">
   <div class="col-md-6 pull-right">
		<button type="submit" class="btn btn-primary">Subir Archivo</button>
		<?php		
		if(isset($_POST) && !empty($_POST))
			{					
			$destino="C:\\xampp\htdocs\crudbase\cargapvp\archivos_cargados\\".$_FILES['filename']['name'];
			$_POST['nomarchivo']=$destino;
			if(move_uploaded_file($_FILES['filename']['tmp_name'],$destino))
				{
				$message= "Archivo Cargado en el Servidor con Exito!!!";
					$class="alert alert-success";
		?>			
				<a href="listado.php?archivo=<?php echo strval($destino);?>" class="btn btn-success" style="display:visible">Cargar Datos</a>
		<?php		
				}
			else
				{
					
				$message="No se Pudo Cargar el Archivo al Servidor";
				$class="alert alert-danger";
				}
		?>
		
   </div>
   </form>
   <div class="col-md-10">
		<div class="<?php echo $class?>">
		   <?php echo $message;?>
		</div>	
		</div>
		<?php
			} //fin del if validar post
		?>
   </div>
 </div>
</div>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>
<?php exit(); ?>