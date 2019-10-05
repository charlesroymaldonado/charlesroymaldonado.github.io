<?php include("seguridad.php"); ?>
<?php
	class Database
	{
		private $con;
		private $serverName = "192.168.6.210, 1433"; //serverName\instanceName
		private $connectionInfo = array( "Database"=>"PTHACAREPOS", "UID"=>"sa", "PWD"=>"Pth.1938");
		function __construct()
		{
			$this->connect_db();
		}
		public function connect_db()
		{
			$this->con = sqlsrv_connect( $this->serverName, $this->connectionInfo);
			if( !$this->con ) 
				{
                    echo "Conexión no se pudo establecer.<br />";
                    die( print_r( sqlsrv_errors(), true));
			    }
			
		}
//Aquí está el código para actualizar TODOS LOS REGISTROS	
		public function update_todos($META_CASOS,$META_INGRESOS)
		{
			$sql = "UPDATE dbo.tbl_rpt_indicadoringresosseg3_chs SET META_CASOS=$META_CASOS, META_INGRESOS=$META_INGRESOS";
			$res = sqlsrv_query($this->con, $sql);
			if($res)
			{
				return true;
			}else
			{
				return false;
			}
		}
//Aquí está el código para el método de lectura GENERAL	
		public function read()
		{
			$sql = "SELECT * FROM dbo.tbl_rpt_indicadoringresosseg3_chs";
			$res = sqlsrv_query($this->con, $sql);
			if( $res === false) 
			die( print_r( sqlsrv_errors(), true));
			/*else	//ESTO ES SOLO PARA PRUEBA POR FAVOR ELIMINAR EN PRODUCCION
			{  
				$numFields = sqlsrv_num_fields($res);
				echo "numero de campos: ";
				echo $numFields;
			}    */
			return $res;
		}	
//Aquí está el código para el método de lectura en un solo registro	
		public function single_record($id)
		{
			$sql = "SELECT * FROM dbo.tbl_rpt_indicadoringresosseg3_chs where SEG3='$id'";
			$res = sqlsrv_query($this->con, $sql);
			return $res;
		}	
//Aquí está el código para actualizar un registro		
		public function update($META_CASOS,$META_INGRESOS, $SEG3)
		{
			$sql = "UPDATE dbo.tbl_rpt_indicadoringresosseg3_chs SET META_CASOS=$META_CASOS, META_INGRESOS=$META_INGRESOS WHERE SEG3='$SEG3'";
			$res = sqlsrv_query($this->con, $sql);
			if($res)
			{	
				return true;
			}else
			{
	
				return false;
			}
		}		
	}
?>
