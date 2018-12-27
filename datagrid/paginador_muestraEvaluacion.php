<?php
 // include("includes/editar_muestra.php");
  $id_evaluacion=$_SESSION["id_evaluacion"];
 ?> 
 
<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Muestras</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
            <th><span class="style5">ID</span></th>
			<th><span class="style5">Total</span></th>
			<th><span class="style5">Picados</span></th>
			<th><span class="style5">% de Infestación</span></th>
			<th><span class="style5">% Intensidad Poblacinal</span></th>
			<th><span class="style5">Nro. Corte</span></th>
			<th><span class="style5">Editar</span></th>
		    </tr>
	        </thead>
	<tbody>

	<?php
	  include("includes/editar_muestras.php");
	  
	  $sql="SELECT * FROM muestras where id_evaluacion=".$id_evaluacion;
	  $resultado=mysql_query($sql);
	  $i=1;
	  $vo_evaluacion=new Evaluacion();
    while($row=mysql_fetch_assoc($resultado)){
      
    echo '
			<td>'.$i.'</td>
			<td><span class="style5"><p class="total" id="'.$row['id_muestras'].'">'.$row['total'].'</p></span></td>
			<td><span class="style5"><p class="picados" id="'.$row['id_muestras'].'">'.$row['picados'].'</p></span></td>
			<td><span class="style5">'.(round(($row['picados']/$row['total'])*1000)/10).'%</span></td>
			<td><span class="style5">0%</span></td>
			<td><span class="style5">'.$vo_evaluacion->buscarNroCorte($id_evaluacion).'</span></td>
			<td><a href="bio_editarMuestra.php?id_muestras='.$row['id_muestras'].'&index='.$i.'">Editar</td>
		</tr>';
		$i++;
	 } ?>
      </tbody>
 <tfoot>
		    <tr>
            <th><span class="style5">ID</span></th>
			<th><span class="style5">Total</span></th>
			<th><span class="style5">Picados</span></th>
			<th><span class="style5">% de Infestación</span></th>
			<th><span class="style5">% Intensidad Poblacinal</span></th>
			<th><span class="style5">Nro. Corte</span></th>
			<th><span class="style5">Editar</span></th>	
		    </tr>
	</tfoot>
</table>

			</div> </div>
