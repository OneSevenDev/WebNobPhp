<div style="border: 1px dotted;">
            <div id="demo">
            <div id="me"></div>
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Campos Evaluados</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	          <thead>
		          <tr>
					<th><span class="style5">ID</span></th>
					<th><span class="style5">Edad (meses)</span></th>
					<th><span class="style5">Nro_Corte</span></th>
					<th><span class="style5">Fecha Evaluación</span></th>
					<th><span class="style5">% de Infestación</span></th>
					<th><span class="style5">Reporte</span></th>
		          </tr>
	        </thead>
	<tbody>
 <?php	
	include("libchart/libchart/classes/libchart.php");
	include("class/Evaluacion.php");	  		
	$id_campo=$_SESSION["id_campo"];	
	$sql="select * from evaluacionCampo where id_campo=".$id_campo." order by fecha_evaluacion";
	$resultado=mysql_query($sql);
	
	$serie1 = new XYDataSet();
	
	$i=1;
	$serie1->addPoint(new Point("Inicio", 0));
    while($row=mysql_fetch_assoc($resultado)){
		$porc=(round($row['porcentaje_resumen']*100)/100);
		$serie1->addPoint(new Point($row['fecha_evaluacion'], $porc));	

		echo '
			<tr>
			<td><span class="style5">'.$i.'</span></td>
			<td><p><span class="style5">'.$row['edad'].'</span></p></td>
			<td><p><span class="style5">'.$row['numero_corte'].'</span></p></td>
			<td><p><span class="style5">'.$row['fecha_evaluacion'].'</span></p></td>
			<td><p><span class="style5">'.(round($row['porcentaje_resumen']*100)/100).'</p></td>
			<td><a href="ger_reporteEvaluacionCampo.php?id_evaluacioncampo='.$row['id_evaluacionCampo'].'">Reporte</a></td>';      
		echo '</tr>';
		$i++;
     } ?>
      </tbody>
			<tfoot>
		          <tr>
					<th><span class="style5">ID</span></th>
					<th><span class="style5">Edad (meses)</span></th>
					<th><span class="style5">Nro_Corte</span></th>
					<th><span class="style5">Fecha Evaluación</span></th>
					<th><span class="style5">% de Infestación</span></th>
					<th><span class="style5">Reporte</span></th>
		          </tr>
			</tfoot>
</table>
</div>
	<?php 
		$vo_campo=new Campo();
		$nombre=$vo_campo->getNombre_from_ID($id_campo);
		$chart = new LineChart(500, 400);
		$chart->setTitle("Evolución de Infestación del campo:".$nombre);
				
		$dataSet = new XYSeriesDataSet();
		$dataSet->addSerie("Campo:".$nombre, $serie1);
		$chart->setDataSet($dataSet);		
		$chart->setLabelY("% de\nInfestación");
		$chart->setLabelX("F. Evaluación");
		$chart->render("libchart/demo/generated/evolucion".$id_campo.".png");
	?>
 </div>