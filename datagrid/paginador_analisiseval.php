<div style="border: 1px dotted;">
      <div id="demo">
            
        <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Resultados del An&aacute;lisis  por Hect&aacute;reas infestadas</h4>
            
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	      <thead>
		    <tr>
			   <th>Escala Infestaci&oacute;n</th>
			   <th>N� Hect&aacute;reas</th>
			   <th>Porcentajes</th>   
		    </tr>
	      </thead>
	     <tbody>
	
	<?php
		//Mostaremos las localidades
	  	$sql="SELECT * FROM V_MostrarDetEval where Id_Eval=".$id;
	  	$resultado=mysql_query($sql);
  		$i=0;
  		$nc=0;
  		$tt=0;
  		$tp=0;
  		$si=0;
  		$bajo=0;
  		$mbajo=0;
  		$malto=0;
  		$alto=0;
		//guardamos las escalas de evaluacion en un array
		$escalas=array('BAJO','MODERADO BAJO','MODERARO ALTO','ALTO');
		//recorremos el resultado de la consulta sql
    	while($row=mysql_fetch_assoc($resultado)){
    	//obtenemos el porcentaje de infestacion
    	$inf=round((($row['Tot_Pica']/$row['Tot_Tallo'])*100)*100)/100;
    	//aumentamos el contador para obtener el numero total de registros de la consulta
			$i++;
			//vamos acumulando valores en las variables
			$nc=$nc+$row['Ha_Cuartel'];
			$tt=$tt+$row['Tot_Tallo'];
			$tp=$tp+$row['Tot_Pica'];
			$si=($si+$inf);
			//validamos las escalas.
			if($inf<=9) $bajo=$bajo+$row['Ha_Cuartel'];
			else if($inf>9 and $inf<=12) $mbajo=$mbajo+$row['Ha_Cuartel'];
			else if($inf>12 and $inf<=18) $malto=$malto+$row['Ha_Cuartel'];
			else if($inf>18) $alto=$alto+$row['Ha_Cuartel'];
			
     	}
     	//obtenemos el total de los valores
			$totale=$bajo+$mbajo+$malto+$alto;
			//obtenemos los promedios
			$pbajo=round(($bajo/$totale*100)*100)/100;
			$pmbajo=round(($mbajo/$totale*100)*100)/100;
			$pmalto=round(($malto/$totale*100)*100)/100;
			$palto=round(($alto/$totale*100)*100)/100;
		    echo '
			<tr>
			<td style="text-align:center;">BAJO</td>
			<td style="text-align:center;">'.$bajo.'</td>
			<td style="text-align:center;">'.$pbajo.'%</td>
      		</tr>
			<tr>
			<td style="text-align:center;">MODERADO BAJO</td>
			<td style="text-align:center;">'.$mbajo.'</td>
			<td style="text-align:center;">'.$pmbajo.'%</td>
			</tr>
			<tr>
			<td style="text-align:center;">MODERADO ALTO</td>
			<td style="text-align:center;">'.$malto.'</td>
			<td style="text-align:center;">'.$pmalto.'%</td>
			</tr>
			<tr>
			<td style="text-align:center;">ALTO</td>
			<td style="text-align:center;">'.$alto.'</td>
			<td style="text-align:center;">'.$palto.'%</td>
			</tr>
			';
		
		 ?>
      </tbody>
 	  <tfoot>
		<tr>
     
			
			<th style="text-align:center;">Total</th>
			<th style="text-align:center;"><?php echo $totale; ?></th>
			<th style="text-align:center;"><?php echo $pbajo+$pmbajo+$pmalto+$palto; ?>%</th>
		</tr>
       
	</tfoot>
</table>

			</div> </div>
