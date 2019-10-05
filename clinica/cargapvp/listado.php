<?php
	if (isset($_GET['archivo'])){
		$nomarchivo=strval($_GET['archivo']);
	} else {
		header("location:iniciocarga.php");
	}
?>

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
	<?php
	//para convertir el xls en csv
	include 'simplexlsx.class.php'; // paquete almacenado en la carpeta cargapvp para manipular archivos .xlsx
	$xlsx = new SimpleXLSX( $nomarchivo );//Instancio la clase y le paso como parametro el archivo a leer
	$destino="C:\\xampp\htdocs\crudbase\cargapvp\archivos_cargados\\"."datos.csv";
	$fp = fopen( $destino, 'w');//Abrire un archivo "datos.csv", sino existe se creara
	foreach( $xlsx->rows() as $fields ) 
	{//Itero la hoja de calculo
        fputcsv( $fp, $fields);//Doy formato CSV a una línea y le escribo los datos
	}
	fclose($fp);//Cierro el archivo "datos.csv"*/
	?>
	
	
	<?php 
		/*include ('cargaBD.php');    //para limpiar y cargar en la base de datos programar en un boton insertar despues de visualizar
		$clientes = new Database();
		if($clientes->limpiar_tabla())
		{
			$clientes->insertar_csv($destino);
		}
		else
		{
			echo"<script> alert('Imposible Borrar Datos!!!.');</script>";
		}*/
	?>
 </div>
</div> 
</body>  
</html>
<?php exit(); ?>