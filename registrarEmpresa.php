<?php
session_start();
include("includes/conexion.inc.php");
include("class/Campo.php");
?>
	<?php        
		$login=$_SESSION["sLogin"];
        $perfil=$_SESSION["sPerfil"];
        if($perfil!="bioseguridad"){
            $_SESSION["sMensaje"] = "Usuario no identificado";
            $pagd="index.php";
            header("Location: $pagd");	
        }
        $controladores="Agregar nuevo* Eliminar";
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
.style2 {color: #000066}
-->
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
										<div>Registro de nuevas empresas.</div>                                    
									  <div id='tabs11'>
										<ul>                                        
										  <li><a href='registrarEmpresa.php'><span>Registrar</span></a></li>
                                          <li><a href='empresasBioseguridad.php'><span>Listar</span></a></li>
										</ul>
									  </div>
										<div style='clear: both;'></div>
									  <div style="border: 1px dotted;">
									    <form id="form1" name="form1" method="post" action="validaciones/validarEmpresa.php">
                                          <table width="908" height="359" border="0">
                                            <tr>
                                              <td height="306" colspan="2"><div align="center">
                                                <table width="372" height="230" border="0">
                                                  <tr>
                                                    <td colspan="2">Registrar Empresa.</td>
                                                    <td width="103">&nbsp;</td>
                                                    <td width="58">&nbsp;</td>
                                                    <td width="63">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td width="47">&nbsp;</td>
                                                    <td width="67">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">Nombre:</span></td>
                                                    <td colspan="3"><label>
                                                      <input type="text" name="tbNombre" id="tbNombre" />
                                                    </label></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">Direcci&oacute;n:</span></td>
                                                    <td colspan="3"><label>
                                                      <input type="text" name="tbDireccion" id="tbDireccion" />
                                                    </label></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">RUC:</span></td>
                                                    <td colspan="3"><label>
                                                      <input type="text" name="tbRuc" id="tbRuc" />
                                                    </label></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="5" style="color:#FF0000"><?php echo"".$_SESSION['sMensaje'];?></td>
                                                  </tr>
                                                </table>
                                              </div></td>
                                              <td colspan="2"><div align="center">
                                                <table width="372" height="230" border="0" bordercolor="1">
                                                  <tr>
                                                    <td colspan="3">Responsable Empresa.</td>
                                                    <td width="58">&nbsp;</td>
                                                    <td width="63">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td width="47">&nbsp;</td>
                                                    <td width="67">&nbsp;</td>
                                                    <td width="103">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">Nombre:</span></td>
                                                    <td colspan="3"><label>
                                                      <input type="text" name="tbNombreG" id="tbNombreG" />
                                                    </label></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">Apellido:</span></td>
                                                    <td colspan="3"><label>
                                                      <input type="text" name="tbApellidoG" id="tbApellidoG" />
                                                    </label></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">Telefono:</span></td>
                                                    <td colspan="3"><label>
                                                      <input type="text" name="tbTelefonoG" id="tbTelefonoG" />
                                                    </label></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">Login:</span></td>
                                                    <td colspan="3"><input type="text" name="tbLoginG" id="tbLoginG" /></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><span class="style2">Contrase&ntilde;a::</span></td>
                                                    <td colspan="3"><label>
                                                      <input type="text" name="tbPasswordG" id="tbPasswordG" />
                                                    </label></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                </table>
                                                <label>
                                                <input type="submit" name="bEnviar" id="bEnviar" value="Crear" />
                                                </label>
                                              </div></td>
                                            </tr>
                                            <tr>
                                              <td width="279" height="35">&nbsp;</td>
                                              <td width="182">&nbsp;</td>
                                              <td width="256">&nbsp;</td>
                                              <td width="171">&nbsp;</td>
                                            </tr>
                                          </table>
										</form>
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