<?php
session_start();
?>
	<?php        
		$login=$_SESSION["sLogin"];
        $perfil=$_SESSION["sPerfil"];
        if($perfil!="bioseguridad"){
            $_SESSION["sMensaje"] = "Usuario no identificado";
            $pagd="index.php";
            header("Location: $pagd");	
        }      
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
                            <li>  <a href="colaboradores.php"><span>Colaboradores</span></a></li>
                            <li>  <a href="empresasBioseguridad.php"><span>Empresas</span></a></li>
							<li>  <a href="controladoresBioseguridad.php"><span>Controladores</span></a></li>
							<li>  <a href="cultivarBioseguridad.php"><span>Cultivar</span></a></li>
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
									<h2 class='title'>Bienvenido <?php echo $login;?>. </h2>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p>Ha accedido al sistema como super usuario.. cualquier cambio realizado aquí, afectará directamente a la empresa relacionada.</p>
										<p>Por favor. manipule los datos con cuidado.</p>
									</div>
								</div>								
	                                <?php  include "complementos/footer.php"; ?>
							  </div>														
						</div>
                      </div>
				</div> 		
			</div>    			
	</div>
	<div></div>
</body>
</html>