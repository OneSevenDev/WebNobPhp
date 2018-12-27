 <?php 
   include("includes/editar_usuarios.php");
  $id_campo=$_SESSION["id_campo"];
 ?> 
<div style="border: 1px dotted;">
            <div id="demo">
            <div id="me"></div>
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Usuarios</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	          <thead>
		          <tr>
						<th><span class="style5">ID</span></th>
			            <th><span class="style5">Nombres</span></th>
			            <th><span class="style5">Apellidos</span></th>
						<th><span class="style5">Mail</span></th>
			            <th><span class="style5">Tel&eacute;fono</span></th>						
			            <th><span class="style5">Login</span></th>
						<th><span class="style5">Perfil</span></th>
					</tr>
	        </thead>
	<tbody>
	<?php
	//Mostaremos las localidades
	  $sql="SELECT * FROM usuario where id_campo=".$id_campo.";";
	  $resultado=mysql_query($sql);
    while($row=mysql_fetch_assoc($resultado)){
      
		echo '
			<td><p><span class="style5">'.$row['id_usuario'].'</span></p></td>
			<td><p><span class="style5">'.$row['nombre'].'</span></p></td>
			<td><p><span class="style5">'.$row['apellido'].'</span></p></td>
			<td><p><span class="style5">'.$row['mail'].'</span></p></td>
			<td><p><span class="style5">'.$row['telefono'].'</span></p></td>
			<td><p><span class="style5">'.$row['login'].'</span></p></td>
			<td><p><span class="style5">'.$row['tipoUsuario'].'</span></p></td>';
		echo '</tr>';
     } ?>
      </tbody>
 <tfoot>
		<tr>
						<th><span class="style5">ID</span></th>
			            <th><span class="style5">Nombres</span></th>
			            <th><span class="style5">Apellidos</span></th>
						<th><span class="style5">Mail</span></th>
			            <th><span class="style5">Tel&eacute;fono</span></th>						
			            <th><span class="style5">Login</span></th>
						<th><span class="style5">Perfil</span></th>
		</tr>
	</tfoot>
</table>

			</div> </div>