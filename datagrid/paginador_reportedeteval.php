<div style="border: 1px dotted;">
            <div id="demo">
            
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Detalle Evaluaci&oacute;n - Id Eval.:<?php echo $id; ?></h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
            
			<th>Cuartel</th>
			<th>Ha</th>
			<?php
			$sql="SELECT * FROM V_MostrarDetEval where Id_Eval=".$id;
	  	$resultado=mysql_query($sql);
    	while($row=mysql_fetch_assoc($resultado)){
    	if($row['Edad_Eval']<=12)
        $ed="Tallos";
      else
        $ed="Entrenudos"; 
    	}
    	?>
			<th>N° <?php echo $ed; ?></th>
			<th>N° Picados</th>
		  <th>% Infestaci&oacute;n</th>
            
		    </tr>
	        </thead>
	<tbody>
	
	<?php
		//Consutla de detalle de evaluacion
	  	$sql="SELECT * FROM V_MostrarDetEval where Id_Eval=".$id;
	  	$resultado=mysql_query($sql);
	  	//inicializamos las variables a usar
		$i=0;
		$nc=0;
		$tt=0;
		$tp=0;
		$si=0;
		$bajo=0;
		$mbajo=0;
		$malto=0;
		$alto=0;
		//recorremos el resultado de la variable
    	while($row=mysql_fetch_assoc($resultado)){
    	//% de infestacion
    	$inf=round((($row['Tot_Pica']/$row['Tot_Tallo'])*100)*100)/100;
    			
    	echo '
			<tr>
			<td style="text-align:center;"><p class="Num_Cuartel" id="'.$row['Id_DEval'].'">'.$row['Num_Cuartel'].'</td>
			<td style="text-align:center;"><p class="Ha_Cuartel" id="'.$row['Id_DEval'].'">'.$row['Ha_Cuartel'].'</td>
			<td style="text-align:center;"><p class="Tot_Tallo" id="'.$row['Id_DEval'].'">'.$row['Tot_Tallo'].'</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$row['Tot_Pica'].'</td>
			<td style="text-align:center;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$inf.'%</td>
      		</tr>';
      //aumentamos el contador para saber numero de registros
			$i++;
			//aumentamos la sumatoria de cuarteles
			$nc=$nc+$row['Ha_Cuartel'];
			//aumentamos la sumatoria de tallos o entrenudos
			$tt=$tt+$row['Tot_Tallo'];
			//aumentamos la sumatoria de picados
			$tp=$tp+$row['Tot_Pica'];
			//sumatoria de infestacion
			$si=($si+$inf);
			//validamos las escalas
			if($inf<=9) $bajo=$bajo+$row['Ha_Cuartel'];
			else if($inf>9 and $inf<=12) $mbajo=$mbajo+$row['Ha_Cuatel'];
			else if($inf>12 and $inf<=18) $malto=$malto+$row['Ha_Cuartel'];
			else if($inf>18) $alto=$alto+$row['Ha_Cuartel'];
     	} ?>
      </tbody>
 	  <tfoot>
		<tr>
     
			
			<th style="text-align:center;">Total</th>
			<th style="text-align:center;"><?php echo $nc; ?></th>
			<th style="text-align:center;"><?php echo $tt; ?></th>
			<th style="text-align:center;"><?php echo $tp; ?></th>
      		<th style="text-align:center;"><?php 
			if($i<>0)
			$prom=$si/$i;
			else
			$prom=0; 
			echo round($prom*100)/100; ?>%</th>
		</tr>
        <tr>
        	<th>Estado del Campo:</th>
            
            <?php
				if($prom<=9){ echo '<th style="background:#FFFF66">BAJO'; $estado="BAJO"; }
				else if($prom>9 and $prom<=12){ echo '<th style="background:#FFFF66">MODERADO BAJO'; $estado="MODERADO BAJO";}
				else if($prom>12 and $prom<=18){ echo '<th style="background:#FF6600; color: white">MODERADO ALTO'; $estado="MODERADO ALTO";}
				else if($prom>18){ echo '<th style="background:#FF0000; color: white">ALTO'; $estado="ALTO";}
			?>
            </th>
            <th></th>
            <th>% Intensidad Infest.</th>
            <th style="background:#FFFF66"><?php echo round($prom*100)/100; ?>%</th>
            <?php
            //obtenemos lor promedios por cada escala
			       if($bajo<>0)
			         $pbajo=($bajo/$nc)*100;
			       else
			         $pbajo=0;
			       if($mbajo<>0)
			         $pmbajo=($mbajo/$nc)*100;
			       else
			         $pmbajo=0;
			       if($malto<>0)
			         $pmalto=($malto/$nc)*100;
			       else
			         $pmalto=0;
			       if($alto<>0)
			         $palto=($alto/$nc)*100;
			       else
			         $alto=0;
			       ?>
        </tr>
	</tfoot>
</table>

			</div> </div>
