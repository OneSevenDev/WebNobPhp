
<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Tratamiento - Cabecera de Evaluaci&oacute;n</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
         <th>ID</th>
			   <th>Campo</th>			
			   <th>N° Corte</th>
			   <th>Cultivo</th>
			   <th>Fecha Eval.</th>      
         <th>Edad</th>
         <th>Aplicar Dosis</th>
		    </tr>
	        </thead>
	<tbody>
	
	<?php
	//Mostaremos las localidades
	  $sql="SELECT Id_Eval,Desc_Campo,Num_Corte,Desc_Cult,Fech_Eval,Edad_Eval FROM V_MostrarCabEval";
	  //echo $sql;
	  $resultado=mysql_query($sql);
    while($row=mysql_fetch_assoc($resultado)){
      
    echo '
			<td>'.$row['Id_Eval'].'</td>
			<td>'.$row['Desc_Campo'].'</td>
			<td><p class="Num_Corte" id="'.$row['Id_Eval'].'">'.$row['Num_Corte'].'</p></td>
			<td>'.$row['Desc_Cult'].'</td>
			<td>'.$row['Fech_Eval'].'</td>
			<td><p class="Edad_Eval" id="'.$row['Id_Eval'].'">'.$row['Edad_Eval'].'</td>
      <td><a href="tratamiento.php?id='.$row['Id_Eval'].'">Aplicar Dosis</a></td>';
		echo '</tr>';
     } ?>
      </tbody>
 <tfoot>
		<tr>     
			<th>ID</th>
			<th>Campo</th>			
			<th>N° Corte</th>
			<th>Cultivo</th>
			<th>Fecha Eval.</th>     
      <th>Edad</th>
      <th>Acci&oacute;n</th>
		</tr>
	</tfoot>
</table>

			</div> </div>
