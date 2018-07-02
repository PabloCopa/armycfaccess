<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from person where name like '%$_GET[s]%' or lastname like '%$_GET[s]%' or address like '%$_GET[s]%' or email like '%$_GET[s]%' or phone like '%$_GET[s]%' ";
$query = pg_query($dbconn,$sql1);
$registros= pg_num_rows ($query);
?>

<?php if(pg_num_rows($query)>0):?>
<table class="table table-bordered" style="background-color: #dad6d673;">
<thead style="color: black;">
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Email</th>
	<th>Direccion</th>
	<th>Telefono</th>
	<th></th>
</thead>
<?php while ($row=pg_fetch_array($query, null, PGSQL_ASSOC)):?>
<tr style="color:black;">
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
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
