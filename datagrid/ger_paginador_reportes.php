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
					<th><span class="style5">Evaluaciones</span></th>					
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
		if($i<10) $tmp="0".$i;
		echo '
			<tr>
			<td><span class="style5">'.$tmp.'</span></td>
			<td><p><span class="style5">'.$row['descripcion'].'</span></p></td>
			<td><p><span class="style5">'.$row['num_hectareas'].'</span></p></td>
			<td><p><span class="style5">'.$row['num_cuarteles'].'</span></p></td>			
			<td><a href="ger_evaluarCampo.php?id_campo='.$row['id_campo'].'">Evaluaciones</a></td>';      
		echo '</tr>';
		$i++;
     } ?>
      </tbody>
 <tfoot>
		          <tr>
					<th><span class="style5">ID</span></th>
					<th><span class="style5">Nombre</span></th>
					<th><span class="style5">Hectareas</span></th>
					<th><span class="style5">Cuarteles</span></th>
					<th><span class="style5">Evaluaciones</span></th>				
		          </tr>	
	</tfoot>
</table>

			</div> </div>