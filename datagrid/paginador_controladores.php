<div style="border: 1px dotted;">
            <div id="demo">
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Controladores</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	        <thead>
		    <tr>
            <th><span class="style5">ID</span></th>
			<th><span class="style5">Nombre</span></th>
			<th><span class="style5">Descripci&oacute;n</span></th>
		    </tr>
	        </thead>
	<tbody>
	<?php
  include("includes/editar_controlador.php");
 ?> 
	<?php
	//Mostaremos las localidades
	  $sql="SELECT * FROM controladores";
	  $resultado=mysql_query($sql);
    while($row=mysql_fetch_assoc($resultado)){
      
    echo '
			<td><span class="style5">'.$row['id_controladores'].'</span></td>
			<td><span class="style5"><p class="nombre" id="'.$row['id_controladores'].'">'.$row['nombre'].'</p></span></td>
			<td><span class="style5"><p class="descripcion" id="'.$row['id_controladores'].'">'.$row['descripcion'].'</p></span></td>
		</tr>';
     } ?>
      </tbody>
 <tfoot>
		<tr>
            <th><span class="style5">ID</span></th>
			<th><span class="style5">Nombre</span></th>
			<th><span class="style5">Descripci&oacute;n</span></th>	
		</tr>
	</tfoot>
</table>

			</div> </div>
