
<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Cabecera de Evaluaci&oacute;n</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
            <th>ID</th>
			<th>Campo</th>
			<th>Has. Netas</th>
			<th>N° Corte</th>
            
			<th>N° Lib.</th>
            <th>Cultivar</th>
			<th>Fecha Eval.</th>
            
            <th>Edad</th>
            <th>Acci&oacute;n</th>
		    </tr>
	        </thead>
	<tbody>
	<?php
   include("includes/editar_cabeval.php");
  ?>
	<?php
	//Mostaremos las localidades
	  $sql="SELECT * FROM V_MostrarCabEval";
	  $resultado=mysql_query($sql);
    while($row=mysql_fetch_assoc($resultado)){
      
    echo '
			<td>'.$row['Id_Eval'].'</td>
			<td>'.$row['Desc_Campo'].'</td>
			<td>'.$row['Ha_Campo'].'</td>
			<td><p class="Num_Corte" id="'.$row['Id_Eval'].'">'.$row['Num_Corte'].'</p></td>
			<td><p class="Num_Lib" id="'.$row['Id_Eval'].'">'.$row['Num_Lib'].'</td>
			<td>'.$row['Desc_Cult'].'</td>
			<td>'.$row['Fech_Eval'].'</td>
			
			<td><p class="Edad_Eval" id="'.$row['Id_Eval'].'">'.$row['Edad_Eval'].'</td>
      <td><a href="mostrareval.php?id='.$row['Id_Eval'].'">Detalles</a></td>';
		echo '</tr>';
     } ?>
      </tbody>
 <tfoot>
		<tr>
     
			<th>ID</th>
			<th>Campo</th>
			<th>Has. Netas</th>            
			<th>N° Corte</th>
			<th>N° Lib.</th>
            <th>Cultivar</th>            
			<th>Fecha Eval.</th>
            
            <th>Edad</th>
            <th>Acci&oacute;n</th>
		</tr>
	</tfoot>
</table>

			</div> </div>
