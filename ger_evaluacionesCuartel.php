<?php
	session_start();
	include("includes/conexion.inc.php");
	include("class/Empresa.php");
	include("class/Campo.php");
	include("class/Cuartel.php");
	include("class/Gerente.php");
		
	$id_cuartel=$_REQUEST['id_cuartel'] ;
	$vo_cuartel=new Cuartel();
	$vo_cuartel->reconstruirCuartel($id_cuartel);
?>
<?php        
	$login=$_SESSION["sLogin"];
	$perfil=$_SESSION["sPerfil"];
	if($perfil!="gerente"){
		$_SESSION["sMensaje"] = "Usuario no identificado";
		$pagd="index.php";
		header("Location: $pagd");	
	}
	$vo_gerente=new Gerente();
	$vo_gerente->reconstruir_x_login($login);
	$id_gerente=$vo_gerente->getid();
	
	$id_empresa=$vo_gerente->getid_empresa();
	$vo_empresa=new Empresa();	
	$vo_empresa->reconstruir($id_empresa);

	$id_campo=$_SESSION["id_campo"];
	$vo_campo=new Campo();
	$vo_campo->reconstruir($id_campo);
	$vo_cuartel=new Cuartel();
	$vo_cuartel->reconstruirCuartel($id_cuartel);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Intranet Bioseguridad</title>
<!--para el datagrid-->
<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery.jeditable.js"></script>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
				  'iDisplayLength' : 50,
					"sPaginationType": "full_numbers",
					"aLengthMenu": [50, 100, 250]
				} );
			} );
</script>
<!--Fin datagrid-->
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
.style1 {color: #0000CC}
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
			<div >			
				<div id='page'>
					<div id='page-bgtop'>
					  <div id='page-bgbtm'>
							<div id='content'>
							  <div class='post'>
									<h3 class='title'>  <?php 
										echo "..:: ".$vo_empresa->getnombre()." --- Campo: ".$vo_campo->getdescripcion(). " ==> Cuartel: ".$vo_cuartel->getdescripcion();?>. 
									</h3>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p>Relación de cuarteles registrados.</p>
										<div id='tabs11'>
											<ul>
												<!-- CSS Tabs -->												
											  <li><a href='ger_cuartelesCampo.php?id_campo=<?php echo $id_campo?>'><span>Volver</span></a></li>
											</ul>
										</div>
										<div style='clear: both;'></div>
										<?php 
											$_SESSION["id_cuartel"]=$id_cuartel;
											include("datagrid/ger_paginador_evaluacionesCuartelTodos.php");
										?>
									</div>
								</div>								
	                                <?php  include "complementos/footer.php"; ?>
							  </div>														
						</div>
                      </div>
				</div> 		
			</div>        	
	</div>
</body>
</html>