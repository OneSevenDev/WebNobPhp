<div style="border: 1px dotted;">
            <div id="demo">
            <p><a href="mostrareval.php">Cabeceras</a>->Detalle</p>
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Detalle Evaluaci&oacute;n - Id Eval.:<?php echo $id; ?></h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
            <th>ID</th>
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
			<th>N째 <?php echo $ed; ?></th>
			<th>N째 Picados</th>
		 
            
		    </tr>
	        </thead>
	<tbody>
	<?php
  include("includes/editar_deteval.php");
  ?>
	<?php
		//Mostaremos las localidades
	  	$sql="SELECT * FROM V_MostrarDetEval where Id_Eval=".$id;
	  	$resultado=mysql_query($sql);
    	while($row=mysql_fetch_assoc($resultado)){
    	$inf=round(($row['Tot_Pica']/$row['Tot_Tallo'])*100)/100;
    			
    	echo '
			<td style="text-align:right;">'.$row['Id_DEval'].'</td>
			<td style="text-align:right;"><p class="Num_Cuartel" id="'.$row['Id_DEval'].'">'.$row['Num_Cuartel'].'</td>
			<td style="text-align:right;"><p class="Ha_Cuartel" id="'.$row['Id_DEval'].'">'.$row['Ha_Cuartel'].'</td>
			<td style="text-align:right;"><p class="Tot_Tallo" id="'.$row['Id_DEval'].'">'.$row['Tot_Tallo'].'</td>
			<td style="text-align:right;"><p class="Tot_Pica" id="'.$row['Id_DEval'].'">'.$row['Tot_Pica'].'</td>
			
      		</tr>';
     	} ?>
      </tbody>
 	  <tfoot>
		<tr>
     
			<th>ID</th>
			<th>Cuartel</th>
			<th>Ha</th>
			<th>N째  <?php echo $ed; ?></th>
			<th>N째 Picados</th>
      
		</tr>
	</tfoot>
</table>

			</div> </div>
