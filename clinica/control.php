<?php
		require("ldap.php");
		header("Content-Type: text/html; charset=utf-8");
		$usr = $_POST["usuario"];
		$usuario = mailboxpowerloginrd($usr,$_POST["clave"]);
		//$usuario = buscar_grupos_ldap($usr,$_POST["clave"]);
		//echo $usuario;
		if($usuario == "0" || $usuario == ''){
			$_SERVER = array();
			$_SESSION = array();
			echo"<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.'); window.location.href='index.php'; </script>";
		}else{
			session_start();
			$_SESSION["user"] = $usuario;
			$_SESSION["autentica"] = "SIP";
			$_SESSION["grupodirectory"] = "WEB";  //aqui se deben indicar el grupo de directory autoizado del usuario
			echo"<script>window.location.href='inicio.php'; </script>";
		}
?>
