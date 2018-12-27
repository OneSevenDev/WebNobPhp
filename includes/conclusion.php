<div style="border: 1px dotted;">
      <div id="demo">
            
        <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Conclusi&oacute;n del An&aacute;lisis</h4>
      
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
			if($i<>0)
			$prom=$si/$i;
			else
			$prom=0;
      //validamos el promedio con la escala 
			if($prom<=9){ $estado="BAJO"; }
			else if($prom>9 and $prom<=12){ $estado="MODERADO BAJO";}
			else if($prom>12 and $prom<=18){ $estado="MODERADO ALTO";}
			else if($prom>18){$estado="ALTO";}
			//obtenemos los promedios
			$pbajo=round(($bajo/$totale*100)*100)/100;
			$pmbajo=round(($mbajo/$totale*100)*100)/100;
			$pmalto=round(($malto/$totale*100)*100)/100;
			$palto=round(($alto/$totale*100)*100)/100;
		  echo '<p>De la evaluaci&oacute;n del campo y seg&uacute;n la escala de infestaci&oacute;n, tenemos que se encuentra en un rango: <b>'.$estado.'</b> 
      </br>Del an&aacute;lisis se tiene que el '.$pbajo.'% del total de hect&aacute;reas se encuentran en el rango: <b>BAJO</b>.';
      if($pmbajo<>0)
        echo '<br>Mientras que el '.$pmbajo.' del total de hect&aacute;reas se encuentra en el rango: <b>MODERADO BAJO</b>';  
      if($pmalto<>0)
        echo '<br>Mientras que el '.$pmalto.' del total de hect&aacute;reas se encuentra en el rango: <b>MODERADO ALTO</b>';
      if($palto<>0)
        echo '<br>Mientras que el '.$palto.' del total de hect&aacute;reas se encuentra en el rango: <b>ALTO</b>';
		 ?>
      
      

			</div> </div>
