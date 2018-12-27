<?php
        session_start();
	include("includes/conexion.inc.php");
	include("class/Empresa.php");
	include("class/Cultivar.php");
	include("class/Campo.php");
	include("class/factorAvance.php");	
	$id_empresa=$_REQUEST['id_empresa'] ;
?>
<?php
	$login=$_SESSION["sPerfil"];
	$Empresa=new Empresa();
	
	if($login!="bioseguridad"){
		$_SESSION["sMensaje"] = "Usuario no identificado";
		$pagd="index.php";
		header("Location:". $pagd);	
	}
	$descripcion="...";
	$cultivar=new Cultivar();
	$lista=$cultivar->getListaDeNombres();
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
.style4 {color: #666666}
.style5 {color: #000000}
.style6 {color: #000033; font-weight: bold; }
-->
</style>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
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
							  <div >
									<h2 class='title'>  <?php echo "..:: ".$Empresa->getNombre_fromId($id_empresa);?>. </h2>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p class="style3">Registro de campo nuevo.</p>
										<div id='tabs11'>
											<ul>
												<!-- CSS Tabs -->
												<li><a href='empresasBioseguridad.php'><span>Volver</span></a></li>												
												<li><a href='bio_registrarCampos.php?id_empresa=<?php echo $id_empresa?>'><span>Registrar</span></a></li>
												<li><a href='bio_camposEmpresa.php?id_empresa=<?php echo $id_empresa?>'><span>Listar</span></a></li>
											</ul>
										</div>
										<div style='clear: both;'></div>										
									</div>
								</div>								
							  </div>														
						</div>
                      </div>
				</div> 		
			</div>          
	  <div align="center">
         <form id="form1" name="form1" method="post" action="validaciones/validarRegistroCampo.php?id_empresa=<?php echo $id_empresa;?>">
          <table width="952" height="71" border="0">
            <tr>
              <td>&nbsp;</td>
              <td width="269">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="299" align="center" valign="top">
              <div align="center">             
                <table width="288" border="0" bgcolor="#DDDDDD">
                  <tr>
                    <td colspan="2"><div align="center"><span class="style6">Informaci&oacute;n de Campo.</span></div></td>
                  </tr>
                  <tr>
                    <td width="72">&nbsp;</td>
                    <td width="240">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><span class="style3">Nombre:</span></td>
                    <td>
                      <label>
                        <input name="tbNombreCampo" type="text" id="tbNombreCampo" size="35" />
                      </label>                   </td>
                  </tr>
                  <tr>
                    <td><span class="style3">Hectareas:</span></td>
                    <td><input name="tbHaCampo" type="text" id="tbHaCampo" size="35" /></td>
                  </tr>
                  <tr>
                    <td><span class="style3">Cuarteles:</span></td>
                    <td><input name="tbCuartelCampos" type="text" id="tbCuartelCampos" size="35" /></td>
                  </tr>
                </table>
              </div>			  </td>
			  <td width="83" valign="top">
			    <div align="center">
                  <table width="281" height="120" border="0" bgcolor="#BBE4FB">
                    <tr>
                      <td colspan="3"><div align="center"><span class="style6">Factor de Avance.</span></div></td>
                    </tr>
                    <tr>
                      <td width="92">&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><span class="style3">Factor:</span></td>
                      <td width="90"><label>
                        <input name="tbfa" type="text" id="tbfa" size="15" value="0" />
                        </label>                      </td>
                      <td width="73"><span class="style4">(Ha/dia)</span> <span class="style3"> </span> </td>
                    </tr>
                    <tr>
                      <td><span class="style3">Precio x Tarea:</span></td>
                      <td colspan="2"><input name="tbPrecio" type="text" id="tbPrecio" size="15" value="0" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                  </table>
		        </div>              </td>
              <td width="283" align="center" valign="top">
			  <div align="center" >
                <table width="269" height="90" border="0" bgcolor="#DDDDDD">
                  <tr>
                    <td height="17" colspan="2"><div align="center"><span class="style6">Cultivar</span></div></td>
                  </tr>
                  <tr>
                    <td width="85" height="17">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                                   
                  <tr>
                    <td><span class="style3">Codigo:</span></td>
                    <td><select name="cbCultivar" id="cbCultivar" >
                      <?php 
							$i=0;
							while($i<count($lista)){
								echo"<option>".$lista[$i]."</option>";
								$i=$i+1;
							}													
						?>
                    </select></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
					<tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><label></label></td>
                  </tr>
                </table>                
              </div>			  </td>
            </tr>
            
            <tr>
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><?php echo"".$_SESSION['sMensaje'];?></td>
              <td align="center">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center"><input type="submit" name="btEnviar" id="btEnviar" value="Registrar" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td><label></label></td>
            </tr>
          </table>
	    </form>
		</div>		
	</div>
	  <div>								
			<?php  include "complementos/footer.php"; ?>
	</div>		
</body>
</html>