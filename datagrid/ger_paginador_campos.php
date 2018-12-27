<div style="border: 1px dotted;">
            <div id="demo">
            <div id="me"></div>
            <h4 style="margin:0;padding:10px; text-align:center;background: #003399;color: white;">
            Campos</h4>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	          <thead>
		          <tr>
					<th><span class="style5">ID</span></th>
					<th><span class="style5">Nombre</span></th>
					<th><span class="style5">Hectareas</span></th>
					<th><span class="style5">Cuarteles</span></th>
					<th><span class="style5">Factor_Avance</span></th>
					<th><span class="style5">Cultivar</span></th>
					<th><span class="style5">Usuarios</span></th>
					<th><span class="style5">Cuarteles</span></th>
		          </tr>
	        </thead>
	<tbody>
 <?php	
	include("includes/editar_campo.php");  
	include("class/Cultivar.php");
	include("class/factorAvance.php");	 
	
	$id_empr=(int)$_SESSION["id_empresa"];	
	$sql="select * from campo where id_empresa=".($id_empr);
	$resultado=mysql_query($sql);
	
	$i=1;
	
	while($row=mysql_fetch_assoc($resultado)){
		$cultivar=new Cultivar();
		$cultivar->reconstruir($row['id_cultivar']);
		
		$factorA=new factorAvance();
		$factorA->reconstruir($row['id_factor_Avance']);
		$tmp=$i;
		if($i<=9) $tmp="0".$i;
		echo '
			<tr>
			<td><span class="style5">'.$tmp.'</span></td>
			<td><span class="style5"><p>'.$row['descripcion'].'</span></p></td>
			<td><span class="style5"><p>'.$row['num_hectareas'].'</span></p></td>
			<td><span class="style5"><p>'.$row['num_cuarteles'].'</span></p></td>
			<td><span class="style5"><p>'.$factorA->getFA().'</span></p></td>
			<td><span class="style5"><p>'.$cultivar->getcodigo().'</p></td>
			<td><a href="ger_usuariosCampo.php?id_campo='.$row['id_campo'].'">Ver Usuarios</a></td>
			<td><a href="ger_cuartelesCampo.php?id_campo='.$row['id_campo'].'">Cuarteles</a></td>';      
		echo '</tr>';
		
		$i++;
     } ?>
      </tbody>
 <tfoot>
		          <tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Hectareas</th>
					<th>Cuarteles</th>
					<th>Factor_Avance</th>
					<th>Cultivar</th>
					<th>Usuarios</th>
					<th>Cuarteles</th>
		          </tr>		
	</tfoot>
</table>

			</div> </div>