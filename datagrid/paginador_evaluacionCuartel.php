<?php 
	//session_start();
	//include("class/Campo.php");
	$id_campo=$_SESSION["id_campo"];
	$campo=new Campo();
?>
<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Muestras</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
				<th><span class="style5">ID</span></th>
				<th><span class="style5">Total de muestras</span></th>
				<th><span class="style5">Tallos Picados</span></th>
				<th><span class="style5">Indice de Infestación</span></th>
				<th><span class="style5">Porcentaje</span></th>
		    </tr>
	        </thead>
	<tbody>
	<?php		
		
		$sql="SELECT * FROM muestras where id_campo=".$id_campo;
		$resultado=mysql_query($sql);
		$i=1;
		while($row=mysql_fetch_assoc($resultado)){
			echo '
					<td><span class="style5">'.$i.'</span></td>
					<td><span class="style5"><p class="descripcion" id="'.$row['id_cuartel'].'">'.$row['Descripcion'].'</p></span></td>
					<td><span class="style5"><p class="hectareas" id="'.$row['id_cuartel'].'">'.(round($row['hectareas'] * 100) / 100).'</p></span></td>
					<td><span class="style5">'.$campo->getNombre_from_ID($id_campo).'</span></td>
					<td><a href="bio_evaluacionCuartel.php?id_cuartel='.$row['id_cuartel'].'">Evaluar</a></td>
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
				<th><span class="style5">Total de muestras</span></th>
				<th><span class="style5">Tallos Picados</span></th>
				<th><span class="style5">Indice de Infestación</span></th>
				<th><span class="style5">Porcentaje</span></th>			
		    </tr>
	</tfoot>
</table>

			</div> </div>
