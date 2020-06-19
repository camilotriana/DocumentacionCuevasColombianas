<div class="row">
     <link rel="stylesheet" type="text/css" href="styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>REGISTRO</h1>
                <br><br><br><br>
		<form action="Validar.php" method="POST">
                       <div class="form-group">
				<label for="usuario">USUARIO</label>
				<input required name="usuario" type="text" id="usuario" placeholder="usuario" class="form-control">
                                <br><br>
				<label for="contraseña">CONTRASEÑA</label>
				<input required name="contraseña" type="password" id="contraseña" placeholder="contraseña" class="form-control">
			</div>
                    <br>
			<button type="submit" class="btn btn-success">ACEPTAR</button>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>

