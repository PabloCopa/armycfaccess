<?php

include "conexion.php";

$sql="SELECT * FROM person";
$result = pg_query ($dbconn, $SQL ) or die("Error en la consulta SQL");
$registros= pg_num_rows($result); ?>

<?php for ($i=0;$i<$registros;$i++): ?>
{
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Email</th>
	<th>Direccion</th>
	<th>Telefono</th>
	<th></th>
</thead>
<?php $row = pg_fetch_array ($result,$i );?>
<tr>
	<td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["lastname"]; ?></td>
	<td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["address"]; ?></td>
	<td><?php echo $row["phone"]; ?></td>
	<td style="width:150px;">
		<a href="./editar.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $row["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $row["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminar.php?id="+<?php echo $row["id"];?>;

			}

		});
		</script>
	</td>
</tr>
</table> 
}
