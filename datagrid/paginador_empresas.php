<?php
  include("includes/editar_empresa.php");
 ?> 
	<div style="border: 1px dotted;">
		<div id="demo">
		<h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Empresas</h4>
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
				<tr>
				<tr>
					<th><span class="style5">ID</span></th>
					<th><span class="style5">Nombre</span></th>
					<th><span class="style5">Dirección</span></th>
					<th><span class="style5">RUC</span></th>
					<th><span class="style5">Gerente</span></th>
					<th><span class="style5">Campos</span></th>					
				</tr>
				</tr>
	        </thead>	

			<tbody>			 
				<?php
					//Mostaremos las localidades 
					$sql="SELECT * FROM empresa";
					$resultado=mysql_query($sql);
					$cont=1;
					$i=1;
					while($row=mysql_fetch_assoc($resultado)){     
						$linkmod="modificarEmpresa.php?id_empresa=".$row['id_empresa'];
						$linkver="bio_camposEmpresa.php?id_empresa=".$row['id_empresa'];
				?>								
						
							<td><span class="style5"><?php echo $i?></span></td>
							<td><span class="style5"><p class="nombreE" id="<?php $row['id_empresa'];?>"> <?php echo $row['nombre'];?> </p></span></td>
							<td><span class="style5"><p class="direccionE" id="<?php $row['id_empresa'];?>"> <?php echo $row['direccion'];?> </p></span></td>
							<td><span class="style5"><p class="RucE" id="<?php $row['id_empresa'];?>"> <?php echo $row['RUC'];?> </p></span></td>  
							<td><a href="<?php echo $linkmod;?>">Ver/Editar</a></td>
							<td><a href="<?php echo $linkver;?>">Ver Campos</a></td>  				
							<td></td>  
							</tr>
				<?php
					}
				?>				 
			</tbody>
			<tfoot>
				<tr>
					<th><span class="style5">ID</span></th>
					<th><span class="style5">Nombre</span></th>
					<th><span class="style5">Dirección</span></th>
					<th><span class="style5">RUC</span></th>
					<th><span class="style5">Gerente</span></th>
					<th><span class="style5">Campos</span></th>					
				</tr>
			</tfoot>			
		</table>		
	</div		