<?php include("../seguridad.php"); 
if($_SESSION["grupodirectory"] != "WEB")
	{
	echo"<script> alert('Usuario no autorizado para este proceso.'); window.location.href='../inicio.php'; </script>";
	exit();
	}
?>
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
					//Aquí está el código para insertar en la tabla	
		public function insertar_csv($NOMBRE_ARCHIVO)
		{
		echo 'Cargando nombre del archivo: '.$NOMBRE_ARCHIVO.' <br>';
         $chk_ext = explode(".",$NOMBRE_ARCHIVO);
 
        if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $handle = fopen($NOMBRE_ARCHIVO, "r");
			 $data = fgetcsv($handle, 1000, ",");                  //eliminar titulo del archivo csv
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
               //Insertamos los datos con los valores...
                $sql = "INSERT into dbo.tbl_SimulacionPVPServ_ch values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
			    $res = sqlsrv_query($this->con, $sql);
				if(!$res)
					echo "error no se pudo insertar";
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
			 echo"<script> alert('Importación exitosa!!!.');</script>";
			  return $res;
         }
        else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para verr si esta separado por " , "
             echo "Archivo invalido!";
         }
		 return 0;
		}
		public function limpiar_tabla()
		{
			$sql = "DELETE FROM dbo.tbl_SimulacionPVPServ_ch";
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