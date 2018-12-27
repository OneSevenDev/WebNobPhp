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
				<th><span class="style5">Indice de Infestación</span></th>
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
					<td><span class="style5"><p class="campo" id="'.$row['id_evaluacion'].'">'.$campo->getNombre_from_ID($id_campo).'</span></p></td>
					<td><span class="style5"><p class="numero_corte" id="'.$row['id_evaluacion'].'">'.$row['numero_corte'].'</span></p></td>
					<td><span class="style5"><p class="edad" id="'.$row['id_evaluacion'].'">'.$row['edad'].'</span></p></td>					
					<td><span class="style5"><p class="fecha_evaluacion" id="'.$row['id_evaluacion'].'">'.$row['fecha_evaluacion'].'</span></p></td>			
					<td><span class="style5"><p class="porcentaje_Total" id="'.$row['id_evaluacion'].'">'.(round($row['porcentaje_Total']*100)/100).'%</span></p></td>';			
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
				<th><span class="style5">Indice de Infestación</span></th>
		    </tr>
	</tfoot>
</table>

			</div> </div>
