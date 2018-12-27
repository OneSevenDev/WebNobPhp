
<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Campos</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
				<th><span class="style5">ID</span></th>
				<th><span class="style5">Variedad</span></th>
				<th><span class="style5">Codigo</span></th>
				<th><span class="style5">Descripci&oacuten </span></th>	
		    </tr>
	        </thead>
	<tbody>
	<?php
		include("includes/editar_cultivar.php");
		$sql="SELECT * FROM cultivar";
		$resultado=mysql_query($sql);
		$i=0;
		while($row=mysql_fetch_assoc($resultado)){
			echo '
					<td><span class="style5">'.$i.'</span></td>
					<td><span class="style5"><p class="variedad" id="'.$row['id_cultivar'].'">'.$row['variedad'].'</p></span></td>
					<td><span class="style5"><p class="codigo" id="'.$row['id_cultivar'].'">'.$row['codigo'].'</p></span></td>
					<td><span class="style5"><p class="descripcion" id="'.$row['id_cultivar'].'">'.$row['descripcion'].'</p></span></td>					
			  ';
				echo '</tr>';
				
				$i++;
		 }
	 ?>
      </tbody>
 <tfoot>
		<tr>
				<th><span class="style5">ID</span></th>
				<th><span class="style5">Variedad</span></th>
				<th><span class="style5">Codigo</span></th>
				<th><span class="style5">Descripci&oacuten </span></th>		    
		</tr>
	</tfoot>
</table>

			</div> </div>