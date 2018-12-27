<?php 
	//session_start();
	include("class/Tratamiento.php");
	$id_cuartel=$_SESSION["id_cuartel"];
	$campo=new Campo();
?>
<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Evaluaciones por cuartel</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
				<th><span class="style5">ID</span></th>
				<th><span class="style5">Campo</span></th>
				<th><span class="style5">Nro_Corte</span></th>
				<th><span class="style5">Edad</span></th>
				<th><span class="style5">Fecha Evaluacion</span></th>
				<th><span class="style5">Numero Muestras</span></th>
				<th><span class="style5">Indice de Infestación</span></th>
				<th><span class="style5">Intensidad Poblacional</span></th>
				<th><span class="style5">Tratamiento</span></th>
				<th><span class="style5">Ver Muestras</span></th>
		    </tr>
	        </thead>
	<tbody>
	<?php				
		$sql="SELECT * FROM evaluacion where id_cuartel=".$id_cuartel." order by fecha_evaluacion";
		$resultado=mysql_query($sql);
		$i=1;
		
		$vo_tratamiento=new Tratamiento();
		
		while($row=mysql_fetch_assoc($resultado)){
			echo '
					<td><span class="style5">'.$i.'</span></td>
					<td><span class="style5"><p class="campo" id="'.$row['id_evaluacion'].'">'.$campo->getNombre_from_ID($id_campo).'</p></span></td>
					<td><span class="style5"><p class="numero_corte" id="'.$row['id_evaluacion'].'">'.$row['numero_corte'].'</p></span></td>
					<td><span class="style5"><p class="edad" id="'.$row['id_evaluacion'].'">'.$row['edad'].'</p></span></td>					
					<td><span class="style5"><p class="fecha_evaluacion" id="'.$row['id_evaluacion'].'">'.$row['fecha_evaluacion'].'</p></span></td>
					<td><span class="style5"><p class="numero_muestras" id="'.$row['id_evaluacion'].'">'.$row['numero_muestras'].'</p></span></td>					
					<td><span class="style5"><p class="porcentaje_Total" id="'.$row['id_evaluacion'].'">'.(round($row['porcentaje_Total']*100)/100).'%</p></span></td>
					<td><span class="style5"><p class="porcentaje_Total" id="'.$row['id_evaluacion'].'">0%</p></span></td>';
			if($vo_tratamiento->existe($row['id_evaluacion']))
					echo '<td><span class="style5"><a href="bio_verTratamiento.php?id_evaluacion='.$row['id_evaluacion'].'">ver Dosis</a></span></td>';
			else
					echo '<td><span class="style5"><a href="bio_aplicarTratamiento.php?id_evaluacion='.$row['id_evaluacion'].'">Aplicar Dosis</a></span></td>';
			
			echo 	'<td><span class="style5"><a href="bio_muestrasEvaluaciones.php?id_cuartel='.$id_cuartel.'&id_evaluaciones='.$row['id_evaluacion'].'">Ver muestras</a></span></td>
					';
			echo '</tr>';
			$i=$i+1;
		 }		 
	 ?>
      </tbody>
 <tfoot>
		    <tr>
				<th><span class="style5">ID</span></th>
				<th><span class="style5">Campo</span></th>
				<th><span class="style5">Nro_Corte</span></th>
				<th><span class="style5">Edad</span></th>
				<th><span class="style5">Fecha Evaluacion</span></th>
				<th><span class="style5">Numero Muestras</span></th>
				<th><span class="style5">Indice de Infestación</span></th>
				<th><span class="style5">Intensidad Poblacional</span></th>
				<th><span class="style5">Tratamiento</span></th>
				<th><span class="style5">Ver Muestras</span></th>
		    </tr>
	</tfoot>
</table>

			</div> </div>
