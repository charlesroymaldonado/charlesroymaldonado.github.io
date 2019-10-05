<div class="container-fluid">
 <div class="row">
   <div class="col-sm-1.5" >
		<img src="../imagenes\logo.png" class="img-fluid" alt="Responsive image">
   </div>
  <div class="col" >
	<h2>Policlínica Táchira | Inteligencia de Negocio</h2>
	<p>Departamento de Tecnología al Servicio de la innovación.<?php for($i=0;$i<100;$i++)echo "&nbsp;"; ?> Usuario: <b><?php echo $_SESSION["user"]; ?></b></p>
 
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link" href="../inicio.php">Inicio</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="#"> Carga Inicial </a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"> Carga por Ajuste </a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../salir.php" class="btn btn-default">Cerrar sesión</a>
		</li>
	</ul>
	</div>
</div>
</div> 