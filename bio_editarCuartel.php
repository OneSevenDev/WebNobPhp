<?php
	session_start();	
	include("class/Empresa.php");
	include("class/Campo.php");
	include("class/Cuartel.php");
	$id_cuartel=$_REQUEST['id_cuartel'] ;
	$vo_cuartel=new Cuartel();
	$vo_cuartel->reconstruirCuartel($id_cuartel);	
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
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
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
.style2 {color: #FF0000}
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
									<h2 class='title'>  <?php
										$id_campo=$_SESSION["id_campo"];
										$id_empresa=$_SESSION["id_empresa"];
										echo "..:: ".$Empresa->getNombre_fromId($id_empresa)." --- Campo: ".$Campo->getNombre_from_ID($id_campo);?>. 
									</h2>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p>Modificación de cuarteles .</p>
										<div id='tabs11'>
											<ul>
												<!-- CSS Tabs -->												
												<li><a href='bio_cuartelesCampo.php?id_campo=<?php echo $id_campo?>'><span>Listar</span></a></li>
											</ul>
									  </div>
										<div class="suggestionsBox" style='clear: both;'></div>
                                        <div align="center">    
										<form id="form1" name="form1" method="post" action="validaciones/validarEditarCuartel.php?id_cuartel=<?php echo $vo_cuartel->getid();?>">
										<table width="694" height="92" border="0" id="current">                                       		 
                                          <tr>
                                              <td width="111">&nbsp;</td>
                                              <td width="185">&nbsp;</td>
                                              <td width="185">&nbsp;</td>
                                              <td width="185">&nbsp;</td>
                                          </tr>
                                            <tr>
                                              <td>Nombres:</td>
                                              <td>
                                                <label>
                                                  <input type="text" name="tbNombreC" id="tbNombreC" value="<?php echo $vo_cuartel->getdescripcion();?>" />
                                                </label>                                              </td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Hectareas:</td>
                                              <td><input type="text" name="tbhaC" id="tbhaC" value="<?php echo $vo_cuartel->getha();?>"/></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td><input type="submit" name="btRegistrarC" id="btRegistrarC" value="Actualizar" /></td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td colspan="4">
                                                <span class="style2"><?php echo"".$_SESSION['sMensaje'];?></span> </td>
                                          </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>
                                                <label></label>                                             </td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
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