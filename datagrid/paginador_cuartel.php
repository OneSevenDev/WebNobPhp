<?php 
	//session_start();
	//include("class/Campo.php");
	$id_campo=$_SESSION["id_campo"];
	$campo=new Campo();
?>
<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Cuarteles</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
				<th><span class="style5">ID</span></th>
				<th><span class="style5">Descripción</span></th>
				<th><span class="style5">Hectareas</span></th>
				<th><span class="style5">Campo</span></th>
				<th><span class="style5">Corte Actual</span></th>
				<th><span class="style5">Evaluar</span></th>
				<th><span class="style5">Evaluaciones</span></th>
				<th><span class="style5">Editar</span></th>
		    </tr>
	        </thead>
	<tbody>
	<?php		
		include("class/Evaluacion.php");	
		include("includes/editar_cuartel.php");
		$vo_evaluacion=new Evaluacion();
		
		$sql="SELECT * FROM cuartel where id_campo=".$id_campo;
		$resultado=mysql_query($sql);
		$i=1;
		
		while($row=mysql_fetch_assoc($resultado)){
			$tmp=$i;
			if($i<10) $tmp="0".$i;
			echo '
					<td><span class="style5">'.$tmp.'</span></td>
					<td><span class="style5"><p class="descripcion" id="'.$row['id_cuartel'].'">'.$row['Descripcion'].'</p></span></td>
					<td><span class="style5"><p class="hectareas" id="'.$row['id_cuartel'].'">'.(round($row['hectareas'] * 100) / 100).'</p></span></td>
					<td><span class="style5">'.$campo->getNombre_from_ID($id_campo).'</span></td>
					<td><span class="style5">'.$vo_evaluacion->getLastNroCorte($row['id_cuartel']).'</span></td>
					<td><a href="bio_evaluarCuartel.php?id_cuartel='.$row['id_cuartel'].'">Evaluar</a></td>
					<td><a href="bio_evaluacionesCuartel.php?id_cuartel='.$row['id_cuartel'].'">ver Evaluaciones</a></td>
					<td><a href="bio_editarCuartel.php?id_cuartel='.$row['id_cuartel'].'">Editar</a></td>
					';
				echo '</tr>';
			$i=$i+1;
		 }		 
	 ?>
      </tbody>
 <tfoot>
		    <tr>
				<th><span class="style5">ID</span></th>
				<th><span class="style5">Descripción</span></th>
				<th><span class="style5">Hectareas</span></th>
				<th><span class="style5">Campo</span></th>
				<th><span class="style5">Corte Actual</span></th>
				<th><span class="style5">Evaluar</span></th>
				<th><span class="style5">Evaluaciones</span></th>
				<th><span class="style5">Editar</span></th>
		    </tr>
	</tfoot>
</table>

			</div> </div>
