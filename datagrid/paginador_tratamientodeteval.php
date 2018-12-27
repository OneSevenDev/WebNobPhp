<div style="border: 1px dotted;">
            <div id="demo">
            <p><a href="tratamiento.php">Cabeceras</a>->Detalle</p>
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Detalle Evaluaci&oacute;n - Id Eval.:<?php echo $id; ?></h4>
            <table style="border: 1px dotted; width: 100%;text-align:center;">
            <?php
  include("includes/editar_detevaltrat.php");
  ?>
	<?php
		//Mostaremos las localidades
	  	$sql="SELECT * FROM V_MostrarDetEvalTrat where Id_Eval=".$id;
	  	$resultado=mysql_query($sql);
    	while($row=mysql_fetch_assoc($resultado)){
    	 if($row['Fech_LibT']=='0000-00-00')
			 $ft1="aaaa-mm-dd";
		    else
			 $ft1=$row['Fech_LibT'];
		  if($row['Fech_LibP']=='0000-00-00')
			 $fp1="aaaa-mm-dd";
		  else
			 $fp1=$row['Fech_LibP'];
		  if($row['Fech_LibC']=='0000-00-00')
			 $fc1="aaaa-mm-dd";
		  else
			 $fc1=$row['Fech_LibC'];
			if($row['Edad_Eval']<=12)
        $ed="Tallos";
      else
        $ed="Entrenudos"; 
    	}
    	
			?>
            
  
            <tr><td><b>Fecha Liberacion Trichogramma: </b></label><?php echo '<p class="Fech_Trich" id="'.$id.'">'.$ft1.'</p>'; ?></td>
            <td><label><b> Fecha Liberacion Paratheresia: </b></label><?php echo '<p class="Fech_Parat" id="'.$id.'">'.$fp1.'</p>'; ?> </td>
            <td><label><b> Fecha Liberacion Crisoperla: </b></label><?php echo '<p class="Fech_Crisop" id="'.$id.'">'.$fc1.'</p>'; ?></td>
            </tr></table>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example1">
	        <thead>
		    <tr>
            <th>ID</th>
			<th>Cuartel</th>
			<th>Ha</th>
			<th><?php echo $ed; ?></th>
			<th>Picados</th>
		  	<th>% Infestaci&oacute;n</th>
            <th bgcolor="#00CCCC">Dosis Tricho</th>
            
            <th bgcolor="#00FF99">Dosis Parathe</th>
            
            <th bgcolor="#99FF00">Dosis Crisop</th>
            
		    </tr>
	        </thead>
	<tbody>
	<?php
	    $sql="SELECT * FROM V_MostrarDetEvalTrat where Id_Eval=".$id;
	  	$resultado=mysql_query($sql);
	    while($row=mysql_fetch_assoc($resultado)){
    	$inf=round(($row['Tot_Pica']/$row['Tot_Tallo'])*100)/100;
    	if(!$row['Dos_Trich'])
			$dt="Pendiente";
		else
			$dt=$row['Dos_Trich'];
		if(!$row['Dos_Parat'])
			$dp="Pendiente";
		else
			$dp=$row['Dos_Parat'];
		if(!$row['Dos_Crisop'])
			$dc="Pendiente";
		else
			$dc=$row['Dos_Crisop'];
		//fecha de dosis	
		if($row['Fech_Trich']=='0000-00-00')
			$ft="aaaa-mm-dd";
		else
			$ft=$row['Fech_Trich'];
		if($row['Fech_Parat']=='0000-00-00')
			$fp="aaaa-mm-dd";
		else
			$fp=$row['Fech_Parat'];
		if($row['Fech_Crisop']=='0000-00-00')
			$fc="aaaa-mm-dd";
		else
			$fc=$row['Fech_Crisop'];
    	echo '
			<td style="text-align:center;">'.$row['Id_DEval'].'</p></td>
			<td style="text-align:center;">'.$row['Num_Cuartel'].'</p></td>
			<td style="text-align:center;"><p class="Ha_Cuartel" id="'.$row['Id_DEval'].'">'.$row['Ha_Cuartel'].'</p></td>
			<td style="text-align:center;"><p class="Tot_Tallo" id="'.$row['Id_DEval'].'">'.$row['Tot_Tallo'].'</p></td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$row['Tot_Pica'].'</p></td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$inf.'</p></td>
			<td style="text-align:center;"><p class="Dos_Tricho" id="'.$row['Id_DEval'].'">'.$dt.'</p></td>
			
			<td style="text-align:center;"><p class="Dos_Parat" id="'.$row['Id_DEval'].'">'.$dp.'</p></td>
			
			<td style="text-align:center;"><p class="Dos_Crisop" id="'.$row['Id_DEval'].'">'.$dc.'</p></td>
			
      		</tr>';
     	} ?>
      </tbody>
 	  <tfoot>
		<tr>
     
            <th>ID</th>			
			<th>Cuartel</th>
			<th>Ha</th>
			<th>Tallos</th>
			<th>Picados</th>
      		<th>% Infestaci&oacute;n</th>
            <th><style="color:#00CCCC">Dosis Tricho</style></th>
            
            <th>Dosis Parathe</th>
            
            <th>Dosis Crisop</th>
            
		</tr>
	</tfoot>
</table>

			</div> </div>
