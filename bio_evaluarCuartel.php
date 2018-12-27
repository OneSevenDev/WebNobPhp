<?php
	session_start();
	include("includes/conexion.inc.php");
	include("class/Cuartel.php");
	include("class/Evaluacion.php");
	include("class/Campo.php");	
	include("class/Empresa.php");	
	$id_cuartel=$_REQUEST['id_cuartel'] ;
	$vo_cuartel=new Cuartel();
	$vo_cuartel->reconstruirCuartel($id_cuartel);
	
	$Campo=new Campo();
	$vo_evaluacion=new Evaluacion();
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
<script type="text/javascript" src="js/jquery-1.2.1.pack.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<!--Para el datepicker-->
<script language="JavaScript" src="js/calendar_db.js"></script>
<link href="calendar.css" rel="stylesheet" type="text/css" media="screen" />
<!--Fin datepicker-->
<SCRIPT> 
var a; 
</SCRIPT>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

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
.style3 {color: #000099}
.style4 {color: #333333}
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
									<h3 class='title'>  <?php
										$id_empresa=$_SESSION["id_empresa"];
										$id_campo=$_SESSION["id_campo"];
										echo "..:: ".$Empresa->getNombre_fromId($id_empresa)." => Campo: ".$Campo->getNombre_from_ID($id_campo). " ==> Cuartel: ".$vo_cuartel->getdescripcion();?>. 
									</h3>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p>Registro de Evaluación.</p>
										<div id='tabs11'>
											<ul>
												<!-- CSS Tabs -->												
											  <li><a href='bio_listaEvaluacionCuartel.php?id_cuartel=<?php echo $id_cuartel;?>'><span>Listar</span></a></li>
											</ul>
									  </div>
										<div class="suggestionsBox" style='clear: both;'></div>
                                        <div align="center">    
										<form id="form1" name="form1" method="post" action="validaciones/validarRegistroEvaluacion.php?id_cuartel=<?php echo $id_cuartel;?>">
										<table width="694" height="92" border="0" id="current">                                       		 
                                          <tr>
                                              <td width="112">&nbsp;</td>
                                              <td width="242">&nbsp;</td>
                                              <td width="132">&nbsp;</td>
                                              <td width="190">&nbsp;</td>
                                          </tr>
                                            <tr>
                                              <td><span class="style4">Cuartel:</span></td>
                                              <td><strong><?php 											  
											  echo $vo_cuartel->getdescripcion(); ?></strong> </td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Nro. de Corte::</td>
                                              <td><input type="text" name="tbCorte" id="tbCorte" value="<?php 
													if (isset($_SESSION["corte_ev"]) && isset($_SESSION["clave_c"])) {
														if ($_SESSION["clave_c"]==$id_campo)
															echo $_SESSION["corte_ev"];
														else
															echo""; 
													}
													?>" 
													
													/></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Edad: (meses)</td>
                                              <td><input type="text" name="tbEdad" id="tbEdad" value="<?php 
													if (isset($_SESSION["edad"]) && isset($_SESSION["clave_c"])) {
														if ($_SESSION["clave_c"]==$id_campo)
															echo $_SESSION["edad"];
														else
															echo""; 
													}
													?>" 
													
													/></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Fecha Evaluaci&oacute;n:</td>
                                              <td>
                                              	  <div><input type="text" name="tbFechEva" id="tbFechEva" value="<?php 
													if (isset($_SESSION["fecha_eval"]) && isset($_SESSION["clave_c"])) {
														if ($_SESSION["clave_c"]==$id_campo)
															echo $_SESSION["fecha_eval"];
														else
															echo""; 
													}
													?>"  />
                                              	   <script language="JavaScript">
												   new tcal ({
													// input name
													'controlname': 'tbFechEva'
												   });
												   </script></div>
                                              </td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>Nro. de Muestras:</td>
                                              <td><input type="text" name="tbNroMuestras" id="tbNroMuestras" /></td>
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