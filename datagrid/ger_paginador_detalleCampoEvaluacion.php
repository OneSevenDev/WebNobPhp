 <?php	
	include("class/Cuartel.php");  
	include("class/Muestra.php"); 
	include("class/Tratamiento.php"); 
	include("class/Controlador.php"); 	
	include("libchart/libchart/classes/libchart.php");
	
	
	$fecha=$_SESSION["fecha_eva"];
	$id_campo=$_SESSION["id_campo"];
	$vo_campo=new Campo();
	$vo_campo->reconstruir($id_campo);
	$sql="select * from evaluacion,cuartel where evaluacion.id_cuartel=cuartel.id_cuartel and cuartel.id_campo=".$id_campo." and evaluacion.fecha_evaluacion='".$fecha."';";
	$resultado=mysql_query($sql);		
	$vo_tratamiento=new Tratamiento();
	if($row=mysql_fetch_assoc($resultado))
	$controlador=$vo_tratamiento->getControlador_from_idevaluacion($row['id_evaluacion']);
?>
<div style="border: 1px dotted;">
    <div id="demo">
        <div id="me"></div>
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Campos Evaluados</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	          <thead>
		          <tr>
					<th><span class="style5">Edad</span></th>
					<th><span class="style5">Fecha</span></th>					
					<th><span class="style5">Cuartel</span></th>
					<th><span class="style5">Ha</span></th>
					<th><span class="style5">Tallos totales</span></th>
					<th><span class="style5">Tallos picados</span></th>
					<th><span class="style5">% Infestación</span></th>
					<th><span class="style5">Tratamiento</span></th>
					<?php 										
						if($controlador=="Trichogramma"){
							$_SESSION["tratamiento"]="Trichogramma";
							echo '<th><span class="style5">Pulgadas/cuartel</span></th>';
						}
						else if($controlador=="Paratheresia"){
							$_SESSION["tratamiento"]="Paratheresia";
							echo '<th><span class="style5">total Parejas</span></th>';
						}
					?>
					
		          </tr>
	        </thead>
	<tbody>
 <?php		
	$sql="select * from evaluacion,cuartel where evaluacion.id_cuartel=cuartel.id_cuartel and cuartel.id_campo=".$id_campo." and evaluacion.fecha_evaluacion='".$fecha."';";
	$resultado=mysql_query($sql);		
    $vo_cuartel=new Cuartel();
	$vo_muestra=new Muestra();
	$vo_tratamiento=new Tratamiento();
	$i=0;
	$tmpHa=0;
	$tmpT=0;
	$tmpP=0;
	$tmpD=0;
	$tmpTM=0;
	
	$chart = new VerticalBarChart(450, 300);
	$dataSet = new XYDataSet();
		
	$chart2=new VerticalBarChart(450, 300);
	$dsPicados = new XYDataSet();
		
	
	while($row=mysql_fetch_assoc($resultado)){
		$vo_cuartel->reconstruirCuartel($row['id_cuartel']);		
		$total=$vo_muestra->getTotalEvaluacion($row['id_evaluacion']);	$tmpT+=$total;
		$picados=$vo_muestra->getPicadosEvaluacion($row['id_evaluacion']); $tmpP+=$picados;
		$porc=(double)(100*$picados/$total);
		$array_por[$i]=$vo_cuartel->getha();
		$tmpHa+=$vo_cuartel->getha();
		$dosis=$vo_tratamiento->getNumeroParejas_from_idevaluacion($row['id_evaluacion']); $tmpD+=$dosis;
		$controlador=$vo_tratamiento->getControlador_from_idevaluacion($row['id_evaluacion']);		
		$tmpTM+=($vo_cuartel->getha()*$dosis);
		$array_inf[$i]=(round(100*$porc)/100);
		$dataSet->addPoint(new Point($vo_cuartel->getdescripcion(), (round(100*$porc)/100)));
		$dsPicados->addPoint(new Point($vo_cuartel->getdescripcion(), $picados));
		$i++;
		
		list($anio, $mes, $dia) = split('[/.-]', $row['fecha_evaluacion']);
		echo '
			<tr>
			<td><span class="style5">'.$row['edad'].'</span></td>
			<td><span class="style5">'.$dia.'/'.$mes.'/'.substr($anio,2,2).'</span></td>
			<td><span class="style5">'.$vo_cuartel->getdescripcion().'</span></td>			
			<td><span class="style5">'.$vo_cuartel->getha().'</span></td>
			<td><span class="style5">'.$total.'</span></td>
			<td><span class="style5">'.$picados.'</span></td>
			<td><span class="style5">'.(round(100*$porc)/100).'</span></td>
			<td><span class="style5">'.$dosis."-".$controlador.'</span></td>
			<td><span class="style5">'.$vo_cuartel->getha()*$dosis.'</span></td>
			'; 
		echo '</tr>';		
     } ?>
      </tbody>
			<tfoot>
				  <tr>
					<th><span class="style5"> Resumen </span></th>
					<th> - </th>					
					<th><span class="style5"><?php echo $i; ?></span></th>
					<th><span class="style5"><?php echo $tmpHa; ?></span></th>
					<th><span class="style5"><?php echo $tmpT; ?></span></th>
					<th><span class="style5"><?php echo $tmpP; ?></span></th>
					<th><span class="style5"><?php $ind_infes=(round(10000*$tmpP/$tmpT)/100); echo $ind_infes; ?></span></th>
					<th><span class="style5"><?php echo "---"; ?></span></th>
					<th><span class="style5"><?php echo $tmpTM; ?></span></th>
		          </tr>
		          <tr>
					<th><span class="style5">Edad</span></th>
					<th><span class="style5">Fecha</span></th>					
					<th><span class="style5">Cuartel</span></th>
					<th><span class="style5">Ha</span></th>
					<th><span class="style5">Tallos totales</span></th>
					<th><span class="style5">Tallos picados</span></th>
					<th><span class="style5">% Infestación</span></th>
					<th><span class="style5">Tratamiento</span></th>
					<?php 										
						if($controlador=="Trichogramma"){						
							echo '<th><span class="style5">Pulgadas/cuartel</span></th>';
						}
						else if($controlador=="Paratheresia")
							echo '<th><span class="style5">total Parejas</span></th>';
					?>
					
		          </tr>
			</tfoot>
</table>

			</div> 
	</div>
	</br>
		
	<div>
	<?php 		
		$_SESSION["ind_infes"]=$ind_infes;
	
		$chart->setDataSet($dataSet);
		$chart->setTitle("Grado de Infestación por Cuartel. (%)");
		$chart->render("libchart/demo/generated/inf-cuartel".$id_campo.".png");
		
  
		$chart2->setDataSet($dsPicados);
		$chart2->setTitle("Tallos picados por cuartel");
		$chart2->render("libchart/demo/generated/picados-cuartel".$id_campo.".png");		
		
		$pye = new PieChart(450, 300);
		$dspye = new XYDataSet();
		
		$vo_escala=new EscalaII();
		$lista=$vo_escala->getListaEscala($vo_campo->getid_empresa());
		
		$con=0;
		foreach ($lista as $indice=>$actual){				
			$resumen[$con]=0;
			$con++;
		}		
		
		for($k=0;$k<count($array_por);$k++){
			$por=$array_por[$k];
			$tmp=0;
			$lista=$vo_escala->getListaEscala($vo_campo->getid_empresa());
			$con=0;
			foreach ($lista as $indice=>$actual){				
				if($array_inf[$k]<=$actual && $tmp==0){
					$tmp=1;
					$resumen[$con]=$resumen[$con]+$por;
				}
				$con++;
			}			
		}
		
		$con=0;
		$lista=$vo_escala->getListaEscala($vo_campo->getid_empresa());
		foreach ($lista as $indice=>$actual){
			$dspye->addPoint(new Point($indice,$resumen[$con]));		
			$con++;
		}
		//echo var_dump($array_por);
		//$dspye->addPoint(new Point("Tallos Infectados",$ind_infes));
		//$dspye->addPoint(new Point("Tallos Sanos", (100-$ind_infes)));
		
		$pye->setDataSet($dspye);

		$pye->setTitle("Distribución de Infestación de campo");		
		$pye->render("libchart/demo/generated/pye-infes".$id_campo.".png");
	?>
	
	
	</div>