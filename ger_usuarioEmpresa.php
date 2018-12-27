<?php
	include("class/Gerente.php");
	include("class/Empresa.php");	
	
	session_start();
	$login=$_SESSION["sLogin"];
	$perfil=$_SESSION["sPerfil"];
	$_SESSION["sMensaje"] ="";
	if($perfil!="gerente"){
		$_SESSION["sMensaje"] = "Usuario no identificado";
		$pagd="index.php";
		header("Location: $pagd");	
	}	
	$vo_gerente=new Gerente();
	$vo_gerente->reconstruir_x_login($login);
	
	$vo_empresa=new Empresa();
	$vo_empresa->reconstruir($vo_gerente->getid_empresa());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Intranet Bioseguridad</title>
	           
<style type="text/css">

<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #;
}
-->
</style>

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style3 {color: #333333}
.style4 {font-size: 16px}
.style5 {color: #000000}
-->
</style>
</head>
<body >
<div id="wrapper">
	  <div id="header-wrapper">
			<div id="header">
					<div id="logo">      
					<h1>BioSeguridad</h1>
					<div id="tabsE"  align ="rigth">
						<ul>
							<!-- CSS Tabs -->
                            <li>  <a href="ger_usuarioEmpresa.php"><span>Inicio</span></a></li>
							<li>  <a href="ger_modificarEmpresa.php"><span>Mi Empresa</span></a></li>
							<li>  <a href="ger_miPerfil.php"><span>Mi Perfil</span></a></li>
							<li>  <a href="ger_misCampos.php"><span>Mis Campos</span></a></li>
							<li>  <a href="ger_miEscala.php"><span>Escala de Infestación</span></a></li>
							<li>  <a href="ger_Reportes.php"><span>Reportes</span></a></li>
                            <li>  <a href="logout.php"><span>Cerrar Sesión</span></a></li>
						</ul>
					</div>
			  </div>
			</div>
		</div>	
		<br/><br/>
        	<div id='page'>
							  <div class='post'>
									<h2 class='title'>Bienvenido <?php echo $vo_empresa->getnombre();?>. </h2>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry style3'>
										<p class="style4"> Hola <?php echo $vo_gerente->getlogin(); ?>, Bioseguridad le da la bienvenida a nuestro sistema exclusivo de control de evaluaci&oacute;n 
									    de campos.<br />
									    Trabajamos para darle un mejor servicio, si tiene alguna duda o sugerencia, 
									    por favor 
									    no 
									    dude<br /> 
									    en escribirnos a ventas@bioseguridad.com.pe</p>
								</div>
			  </div>
  </div> 
       
	  <?php  include "complementos/footer.php"; ?>
	</div>
</body>
</html>