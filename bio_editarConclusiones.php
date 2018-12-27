<?php
	session_start();
	include("includes/conexion.inc.php");
	include("class/Empresa.php");
	include("class/Campo.php");
	include("class/Conclusion.php");
	$id_evaluacioncampo=$_REQUEST['id_evaluacioncampo'];
?>
<?php
	$login=$_SESSION["sPerfil"];
	$Empresa=new Empresa();
	$Campo=new Campo();
	if($login!="bioseguridad"){
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
									<h2 class='title'>
									<?php 				
										$id_empresa=$_SESSION["id_empresa"];
										$id_campo=$_SESSION["id_campo"];
										$Campo->reconstruir($id_campo);
										echo "..:: ".$Empresa->getNombre_fromId($id_empresa)." --- Campo: ".$Campo->getdescripcion();
									?>  
									</h2>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p><span class="style5">Lista de conclusiones.</span></p>
									<div align="center">
                                    <form id="form1" name="form1" method="post" action="validaciones/bio_validarRegistroConclusion.php?id_evaluacioncampo=<?php echo $id_evaluacioncampo;?>">
									  <table width="274" height="27" border="0">
                                        <tr>
                                          <td align="center" width="30"><span class="style5"><b>Id</b></span></td>
                                          <td align="center" width="130"><span class="style5"><b>Conclusión</b></span></td>
                                        </tr>
                                        <?php 
											$vo_conclusion= new Conclusion();
											$lista=$vo_conclusion->getListaDeConclusiones($id_evaluacioncampo);											
											for($i=1;$i<=count($lista);$i++){
												echo '
												   <tr>
													<td width="20" height="19" class="style5">'.$i.'</td>													
													<td width="130" class="style3"><input name="tbValor'.$i.'" type="text" id="tbValor'.$i.'" size="120" value="'.$lista[$i-1].'"/></td>
												   </tr>'
													   ;
											}
											for($k=$i;$k<11;$k++){
												echo '
													<tr>
														<td width="20" height="19" class="style5">'.$k.'</td>													
														<td width="130" class="style3"><input name="tbValor'.$k.'" type="text" id="tbValor'.$k.'" size="120" value=""/></td>
													</tr>'
												;
											}
										?>
                                        <tr>
                                          <td align="center" width="20">...</td>										   
                                          <td align="center" width="120"><label>
                                            <input type="submit" name="btEnviar" id="btEnviar" value="Grabar" />
                                          </label></td>
                                        </tr>                                        
                                      </table>
                                      </form>
									</div>
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