<?php 
	session_start(); 
	//datos para establecer la conexion con la base de mysql.
	$conn = mysqli_connect('localhost','biosegur_admin','bio.intranetbd','biosegur_intranet')or die ('Ha fallado la conexi&oacute;n: '.mysqli_error());
	//mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	  
	if(trim($_POST["tbLogin"]) != "" && trim($_POST["tbPassword"]) != "")
	{
		//convertir los a su entidad HTML aplicable con htmlentities
		$usuario = $_POST["tbLogin"];   
		$password = $_POST["tbPassword"];	
		$perfil="";
		$band=false;
		$result = mysqli_query($conn,'SELECT tipoUsuario,login,contrasena FROM usuario WHERE login=\''.$usuario.'\'');
		if($row = mysqli_fetch_array($result)){
			$perfil="usuario";
			$band=true;
		}		
		else{
			$result = mysqli_query($conn,'SELECT login,contrasena FROM gerente WHERE login=\''.$usuario.'\'');
			if($row= mysqli_fetch_array($result)){
				$perfil="gerente";
				$band=true;
			}
			else{
				$result = mysqli_query($conn,'SELECT login,contrasena FROM bioseguridad WHERE login=\''.$usuario.'\'');
				if($row = mysqli_fetch_array($result)){
					$perfil="bioseguridad";
					$band=true;
				}
			}
		}
		if($band){
			if($row["contrasena"] == $password){	
				$_SESSION["sLogin"] = $row['login'];
				$_SESSION["sPerfil"] = $perfil;
				$_SESSION["sMensaje"] ="";
				if($perfil=="usuario"){
					$_SESSION["sTipoUsuario"] = $row['tipoUsuario'];
					$pagd="../usuarioCampo.php";
					header("Location: $pagd");					
				}
				else if($perfil=="gerente"){
					$pagd="../ger_usuarioEmpresa.php";				
					header("Location: $pagd");	
				}
				else if($perfil=="bioseguridad"){
					$pagd="../usuarioBioseguridad.php";
					header("Location: $pagd");	
				}
				else{
					$_SESSION["sMensaje"] = "Error de sistema";
					$pagd="../index.php";
					header("Location: $pagd");
				}
			}
			else{
				$_SESSION["sMensaje"] = "Password Incorrecto";
				$pagd="../index.php";
				header("Location: $pagd");			
			}
		}else{
			$_SESSION["sMensaje"] ="Usuario no registrado";			
			$pagd="../index.php";
			header("Location: $pagd");
		}
		mysqli_free_result($result);
	}else{
		$_SESSION["sMensaje"] ="Debe especificar un usuario y password";
		$pagd="../index.php";
		header("Location: $pagd");
	}
	mysqli_close();
?>