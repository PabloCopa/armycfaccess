<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from personas";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Apto Fisico</th>
	<th>Direccion</th>
	<th>Telefono</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["apellido"]; ?></td>
	<td><?php echo $r["apto_fisico"]; ?></td>
	<td><?php echo $r["address"]; ?></td>
	<td><?php echo $r["telefono"]; ?></td>
	<td style="width:150px;">
		<a href="./editar.php?id_personas=<?php echo $r["id_personas"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id_personas="del-<?php echo $r["id_personas"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id_personas"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminar.php?id="+<?php echo $r["id"];?>;

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
