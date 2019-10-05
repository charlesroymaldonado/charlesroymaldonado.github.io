 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Barra de Navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://policlinicatachira.com.ve/~policlin/sitio/index.php">Policlínica Táchira | Inteligencia de Negocio</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Administrar Segmentos</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Otros Procesos</li>
                <li><a href="#">Prueba</a></li>
                <li><a href="salir.php">Salir</a></li>
              </ul>
            </li>
            <li><a href="principal.php">Parametros</a></li>
            <li><a href="#"> Reportes </a></li>
			
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procesos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./cargapvp/iniciocarga.php">Carga Precio</a></li>
                <li><a href="#">Datos Simulación</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Otros Procesos</li>
                <li><a href="#">Carga Inventario</a></li>
                <li><a href="salir.php">Salir</a></li>
              </ul>
            </li>
			
			<li><a href="salir.php" class="btn btn-default">Cerrar sesión</a></li>
			<li><br>&nbsp;&nbsp;&nbsp;&nbsp;Usuario: <b><?php echo $_SESSION["user"]; ?></b></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>