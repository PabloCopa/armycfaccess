<?php
include "conexion.php";

$id_personas=null;
$sql1= "select * from personas where id_personas = ".$_GET["id_personas"];
$query = $con->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>

<form role="form" method="post" action="php/actualizar.php">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $personas->nombre; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $personas->apellido; ?>" name="apellido" required>
  </div>
  <div class="form-group">
    <label for="address">Domicilio</label>
    <input type="text" class="form-control" value="<?php echo $person->address; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="apto_fisico">Apto Fisico</label>
    <input type="text" class="form-control" value="<?php echo $personas->apto_fisico; ?>" name="apto" >
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" value="<?php echo $personas->telefono; ?>" name="phone" >
  </div>
<input type="hidden" name="id" value="<?php echo $personas->id_personas; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>