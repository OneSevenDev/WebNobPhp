<?php
	session_start();
	include("includes/conexion.inc.php");
	include("class/Empresa.php");
	include("class/Campo.php");
	include("class/EvaluacionCampo.php");
	include("class/Cultivar.php");
	include("class/EscalaII.php");
	include("class/Conclusion.php");
	
	$id_evaluacioncampo=$_REQUEST['id_evaluacioncampo'];
	$vo_ec=new EvaluacionCampo();
	$vo_ec->reconstruir($id_evaluacioncampo);
	$vo_cultivar=new Cultivar();
	
	$vo_campo= new Campo();
	$vo_campo->reconstruir($vo_ec->getid_campo());		
	
	$vo_escala=new EscalaII();
	$lista=$vo_escala->getListaEscala($vo_campo->getid_empresa());
	
	$vo_conclusion=new Conclusion();
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
.style3 {font-family: "times new roman"; font-size: 14px; color: #000066;}
.style4 {
	color: #333333;
	font-size: 14;
}
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
									?>. 
									</h2>
									<div style='clear: both;'>&nbsp;</div>
									<div class='entry'>
										<p>Reporte detallada de infestación.</p>
										<div id='tabs11'>
											<ul>
												<!-- CSS Tabs -->												
											  <li><a href='bio_evaluarCampo.php?id_campo=<?php echo $id_campo?>'><span>Volver</span></a></li>
											</ul>
										</div>
										<div style='clear: both;'></div>
										<div style="border:3px solid #0C3CA9;">
										  <table width="904" height="104" border="0" bordercolor="#000000" bgcolor="#CCCCCC" cellspacing=0 cellpadding=2>
                                            <tr>
                                              <td width="94" ><span class="style5"><strong>Campo</strong>:</span></td>
                                              <td width="156"><span class="style5"> <?php echo $Campo->getdescripcion(); ?></span></td>
                                              <td width="119"><span class="style5"><strong>HAS. Netas: </strong></span></td>
                                              <td width="190"><span class="style5"> <?php echo $Campo->getnum_ha(); ?></span></td>
                                              <td width="103"><span class="style5"><strong>Nro Corte: </strong></span></td>
                                              <td width="134" class="style5"><?php echo $vo_ec->getnumero_corte(); ?></td>
                                            </tr>
                                            <tr>
                                              <td><span class="style5"><strong>Cultivar</strong>:</span></td>
                                              <td class="style5"><?php $vo_cultivar->reconstruir($Campo->getid_cultivar()); echo $vo_cultivar->getvariedad()."-".$vo_cultivar->getcodigo(); ?></td>
                                              <td><span class="style5"><strong>Fecha Evaluaci&oacute;n: </strong></span></td>
                                              <td class="style5"><?php echo $vo_ec->getfecha_evaluacion();?></td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table>
									  </div>
										<?php 		
											$_SESSION["fecha_eva"]=$vo_ec->getfecha_evaluacion();
											include("datagrid/paginador_detalleCampoEvaluacion.php");
										?>
									</div>
                                    <br/><br/>
									<div align="center">
                                      <table width="850" border="0">
                                        <tr>
                                          <td><input type="image" name="reporte" id="reporte" src="libchart/demo/generated/inf-cuartel<?php echo $id_campo;?>.png" /></td>
                                          <td><input type="image" name="picados" id="picados" src="libchart/demo/generated/picados-cuartel<?php echo $id_campo;?>.png" /></td>
                                        </tr>
                                        <tr>
                                        	<td><img src="libchart/demo/generated/pye-infes<?php echo $id_campo;?>.png" width="450" height="300" /></td>
                                       	  <td><div align="center">                                          
                                       	    <table width="216" height="57" border="0" bgcolor="#CCCCCC">
                                              <tr>
                                                <td height="24" colspan="2" class="style3 style4">Escala de Intensidad de Infestaci&oacute;n</td>
                                              </tr>
                                            <?php 
												$tmp=1;
												$final=-1;
											  foreach ($lista as $indice=>$actual){
												   if($tmp==1){
													   echo '
													   <tr>
														<td width="134" height="19" class="style3">'.$indice.':</td>
														<td width="100" class="style3">Menor a '.$actual.'%</td>
													   </tr> '
													   ;											   											   
												   }
												   else if($final==-1){
													   echo '
													   <tr>
														<td width="134" height="19" class="style3">'.$indice.':</td>
														<td width="100" class="style3">Hasta'.$actual.'%</td>
													   </tr> '
													   ;												   												   
												   }
													else{
														echo '
														   <tr>
															<td width="134" height="19" class="style3">'.$indice.':</td>
															<td width="100" class="style3">Mayor'.$final.'%</td>
														   </tr> '
														   ;													
													}
												   $tmp++;
												   if($tmp==count($lista))
														$final=$actual;
											   }											   
											?>
                                           </table>
                                   	      </div>
                                          <br />
										  <br />
                                          <div  align="justify"><?php $ind_infes=$_SESSION["ind_infes"];
										  		$clasi=""; 
												$tmp=0;
											  foreach ($lista as $indice=>$actual){
                                               	if($ind_infes<=$actual && $tmp==0){
													$clasi=$indice;
													$tmp=1;
												}
											   }
										  ?>
                                          	<ul class="style5">                                            	
                                                <?php 
													$lista=$vo_conclusion->getListaDeConclusiones($id_evaluacioncampo);
													for($i=0;$i<count($lista);$i++)
														echo '<li>'.$lista[$i].'</li>';
												?>
												<li><b><a href="bio_editarConclusiones.php?id_evaluacioncampo=<?php echo $id_evaluacioncampo;?>">Editar conclusión</b></li>
                                            </ul>
                                          </div>
                                          </td>                                            
                                        </tr>
                                      </table>
									  <label></label>
									  <label></label>
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