<html>
	<head>
		<title>.: ARMY CF ACCESS :.</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/style-ver.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>VER ENTRADAS</h2>
<!-- Button trigger modal -->
  <a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar</a>
<br><br>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #8fa589de;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">AGREGAR USUARIO</h4>
        </div>
        <div class="modal-body">
            <form role="form" method="post" action="php/agregar.php">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" placeholder="Box&Gym" name="name" required>
              </div>
              <div class="form-group">
                <label for="lastname">Apellido</label>
                <input type="text" class="form-control" placeholder="Army" name="lastname" required>
              </div>
              <div class="form-group">
                <label for="address">Domicilio</label>
                <input type="text" class="form-control" placeholder="Castelli 266" name="address" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="army@boxgym.com" name="email" data-error="Ingrese un Email valido." required>
              </div>
              <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" class="form-control" placeholder="12345678" name="phone" required>
              </div>

              <button type="submit" class="btn btn-default">Agregar</button>
            </form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<?php include "php/tabla.php"; ?>
</div>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>