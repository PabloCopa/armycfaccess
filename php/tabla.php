<?php
include "conexion.php";

$user_id=null;
$sql='SELECT * FROM person';
$result = pg_query ($dbconn, $sql );
$registros= pg_num_rows($result); ?>

<?php if(pg_num_rows($result)>0): ?>

<table class="table table-bordered" style="background-color: #dad6d673;">
        <thead style="color: black;">
            <th>Nº Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Creado</th>
        </thead>
<?php while ($row=pg_fetch_array($result, null, PGSQL_ASSOC)):?>
<tr style="color:black;">
    <td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["lastname"]; ?></td>
	<td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["address"]; ?></td>
	<td><?php echo $row["phone"]; ?></td>
	<td><?php echo $row["created_at"]; ?></td>
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