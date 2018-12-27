
<div style="border: 1px dotted;">
            <div id="demo">
            <p><table width="100%"><tr><td><a href="reportes.php">Cabeceras</a>->Detalle</td><td>&nbsp;</td><td style="text-align:right"><a href="exporteval.php?id=<?php echo $id; ?>" style="text-align:right" target="_blank">Exportar a PDF</a></td></tr></table></p>
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Reportes de Evaluaci&oacute;n</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
            <th>ID</th>
			<th>Campo</th>
			<th>N° Corte</th>
            <th>Cultivo</th>
			<th>N° Lib.</th>
			<th>Fecha Eval.</th>
            
            <th>Edad</th>
            
		    </tr>
	        </thead>
	<tbody>
	
	<?php
	//Mostaremos las localidades
	  $sql="SELECT Distinct * FROM V_MostrarCabEval where Id_Eval=".$id;
	  $resultado=mysql_query($sql);
    while($row=mysql_fetch_assoc($resultado)){
      
    echo '
			<td  style="text-align:center;">'.$row['Id_Eval'].'</td>
			<td  style="text-align:center;">'.$row['Desc_Campo'].'</td>
			
			<td  style="text-align:center;"><p class="Num_Corte" id="'.$row['Id_Eval'].'">'.$row['Num_Corte'].'</p></td>
			<td>'.$row['Desc_Cult'].'</td>
			<td  style="text-align:center;"><p class="Num_Lib" id="'.$row['Id_Eval'].'">'.$row['Num_Lib'].'</td>
			<td  style="text-align:center;">'.$row['Fech_Eval'].'</td>
			
			<td  style="text-align:center;"><p class="Edad_Eval" id="'.$row['Id_Eval'].'">'.$row['Edad_Eval'].'</td>
      ';
		echo '</tr>';
     } ?>
      </tbody>
 <tfoot>
		<tr>
     
			<th>ID</th>
			<th>Campo</th>
			
			<th>N° Corte</th>
            <th>Cultivo</th>
			<th>N° Lib.</th>
			<th>Fecha Eval.</th>
           
            <th>Edad</th>
            
		</tr>
	</tfoot>
</table>

			</div> </div>
