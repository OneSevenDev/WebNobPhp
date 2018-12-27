<?php
	session_start();
	include("includes/conexion.inc.php");
	include("class/Empresa.php");
	include("class/Campo.php");
	$id_campo=$_REQUEST['id_campo'] ;
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
										$id_empresa=$_SESSION["id_empresa"];
										echo "..:: ".$Empresa->getNombre_fromId($id_empresa)." --- Campo: ".$Campo->getNombre_from_ID($id_campo);?>. 
									</h2>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p>Registrar nuevo Usuario.</p>
										<div id='tabs11'>
											<ul>
												<!-- CSS Tabs -->
											  <li><a href='bio_camposEmpresa.php?id_empresa=<?php echo $id_empresa;?>'><span>Volver</span></a></li>
											  <li><a href='bio_registrarUsuario.php?id_campo=<?php echo $id_campo;?>'><span>Registrar</span></a></li>
											  <li><a href='bio_usuariosCampo.php?id_campo=<?php echo $id_campo;?>'><span>Listar</span></a></li>
											</ul>
									  </div>
										<div class="suggestionsBox" style='clear: both;'></div>
                                        <div align="center">    
										<form id="form1" name="form1" method="post" action="validaciones/validarRegistroUsuario.php?id_campo=<?php echo $id_campo;?>">
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
                                                  <input type="text" name="tbNombreU" id="tbNombreU" />
                                                </label>                                              </td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Apellidos:</td>
                                              <td><input type="text" name="tbApellidoU" id="tbApellidoU" /></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Mail:</td>
                                              <td><input type="text" name="tbMailU" id="tbMailU" /></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Telefono:</td>
                                              <td><input type="text" name="tbTelefonoU" id="tbTelefonoU" /></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Perfil de Usuario:</td>
                                              <td>
                                                <select name="cbPerfilU" id="cbPerfilU">
                                                  <option>registrador</option>
                                                  <option>visualizador</option>                                               
                                                  </select>                                             </td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                          </tr>
                                            <tr>
                                              <td>Login:</td>
                                              <td><input type="text" name="tbLoginU" id="tbLoginU" /></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Contrase&ntilde;a:</td>
                                              <td><input type="password" name="tbPasswordU" id="tbPasswordU" /></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td><input type="submit" name="btRegistrarU" id="btRegistrarU" value="Registrar" /></td>
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