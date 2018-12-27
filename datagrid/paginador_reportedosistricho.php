<div style="border: 1px dotted;">
            <div id="demo">
            
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Detalle Evaluaci&oacute;n - Id Eval.:<?php echo $id; ?></h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
            
			<th>Cuartel</th>
			<th>Ha</th>
			<th>N� Tallos</th>
			<th>N� Picados</th>
		  	<th>% Infestaci&oacute;n</th>
            <th>Dosis Tricho</th>
            <th>Total Pulg2 Tricho</th>
            <th>Num Vasos</th>
            <th>Fecha Lib.</th>
		    </tr>
	        </thead>
	<tbody>
	
	<?php
		//Mostaremos las localidades
	  	$sql="SELECT * FROM V_MostrarDetEvalTrat where Id_Eval=".$id;
	  	$resultado=mysql_query($sql);
		$i=0;
		$nc=0;
		$tt=0;
		$tp=0;
		$si=0;
		$dp=0;
		$pdp=0;
    	while($row=mysql_fetch_assoc($resultado)){
    	$inf=round((($row['Tot_Pica']/$row['Tot_Tallo'])*100)*100)/100;
		if($row['Dos_Trich']<>''){
    	$dos=round(($row['Ha_Cuartel']*$row['Dos_Trich'])*100)/100;	
		$d=$row['Dos_Trich'];
		$pdp=$pdp+$dos;
		}
		else{
		$dos="Pendiente";
		$d="Pendiente";
		}
		$vasos=$dos/2;
		$nvasos=$nvasos+$vasos;
		if($row['Fech_LibT']<>'0000-00-00')
		   $fecha=$row['Fech_LibT'];
		else
		    $fecha='Pendiente';
    	echo '
			<tr>
			<td style="text-align:center;"><p class="Num_Cuartel" id="'.$row['Id_DEval'].'">'.$row['Num_Cuartel'].'</td>
			<td style="text-align:center;"><p class="Ha_Cuartel" id="'.$row['Id_DEval'].'">'.$row['Ha_Cuartel'].'</td>
			<td style="text-align:center;"><p class="Tot_Tallo" id="'.$row['Id_DEval'].'">'.$row['Tot_Tallo'].'</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$row['Tot_Pica'].'</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$inf.'%</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$d.'</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$dos.'</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$vasos.'</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$fecha.'</td>
      		</tr>';
			$i++;
			$nc=$nc+$row['Ha_Cuartel'];
			$tt=$tt+$row['Tot_Tallo'];
			$tp=$tp+$row['Tot_Pica'];
			$si=($si+$inf);
			$dp=$dp+$row['Dos_Trich'];
			if($inf<=9) $bajo=$bajo+$row['Ha_Cuartel'];
			else if($inf>9 and $inf<=12) $mbajo=$mbajo+$row['Ha_Cuatel'];
			else if($prom>12 and $prom<=18) $malto=$malto+$row['Ha_Cuartel'];
			else if($prom>18) $alto=$alto+$row['Ha_Cuartel'];
     	} ?>
      </tbody>
 	  <tfoot>
		<tr>
     
			
			<th>Total</th>
			<th style="text-align:center;"><?php echo $nc; ?></th>
			<th style="text-align:center;"><?php echo $tt; ?></th>
			<th style="text-align:center;"><?php echo $tp; ?></th>
      		<th style="text-align:center;"><?php $prom=$si/$i; echo round($prom*100)/100; ?>%</th>
            <th style="text-align:center;"><?php echo $dp; ?></th>
            <th style="text-align:center;"><?php echo $pdp; ?></th>
            <th style="text-align:center;"></th>
            <th style="text-align:center;">&nbsp;</th>
		</tr>
        
	</tfoot>
</table>

			</div> </div>
