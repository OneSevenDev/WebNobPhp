<?php
	session_start();
	include("includes/conexion.inc.php");
	include("class/Empresa.php");
	include("class/Campo.php");
	include("class/Cuartel.php");
	include("class/Controlador.php");
	include("class/Tratamiento.php");
	include("class/Evaluacion.php");
	
	$id_evaluacion=$_REQUEST['id_evaluacion'];
	$vo_evaluacion=new Evaluacion();
	$vo_evaluacion->reconstruir($id_evaluacion);
	
	$vo_tratamiento=new Tratamiento();
	$vo_tratamiento->reconstruir($id_evaluacion);
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
							<li>  <a href="logout.php"><span>Cerrar Sesi�n</span></a></li>
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
										$vo_cuartel=new Cuartel();
										$vo_cuartel->reconstruirCuartel($vo_evaluacion->getid_cuartel());
										echo "..:: ".$Empresa->getNombre_fromId($id_empresa)." => Campo: ".$Campo->getNombre_from_ID($id_campo). " ==> Cuartel: ".$vo_cuartel->getdescripcion();?>. 
									</h3>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p>Relaci�n de cuarteles registrados.</p>
										<div id='tabs11'>
											<ul>
												<!-- CSS Tabs -->												
											  <li><a href='bio_evaluacionesCuartel.php?id_cuartel=<?php echo $vo_cuartel->getid();?>'><span>Volver</span></a></li>
											</ul>
										</div>
										<div style='clear: both;'></div>
										<div style='width: 800px; margin: 0 auto; background:white;'>										
                                        <fieldset>
                                         	<legend> Dosis Aplicada al cuartel <?php echo $vo_cuartel->getdescripcion(); ?>:</legend>  
                                            <dl>
                                            	<dt><label>Controlador <?php $vo_c=new Controlador();
									$id_c=$vo_tratamiento->getid_controladores();
									echo $vo_c->getNombreFromID($id_c); ?>
                                                 </label> 
                                                </dt>
                                            </dl>
                                            <dl>
                                            	<dt></dt>
                                            </dl>                                            
                                            <dl>
                                            	<dt><label>Numero de Parejas: <?php echo $vo_tratamiento->getnumero_parajeas(); ?></label></dt>
                                            </dl>
                                            <dl>
                                            	<dt></dt>
                                            </dl>                                            
                                            <dl>
                                            	<dt>
                                                <label>Fecha Tratamiento <?php echo $vo_tratamiento->getfecha_tratamiento(); ?> </label>                                                
                                                </dt>
                                            </dl>                                            
                                            <dl>
                                            	<dt></dt>
                                            </dl>
                                                                                     
                                        </fieldset>                                        
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