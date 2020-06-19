<div class="row">
    <link rel="stylesheet" type="text/css" href="styles/label.css" media="screen" />
    <h1>BUSCAR CUEVA</h1>
    <br><br><br><br>
	<div class="col-12">
		<form action="ValidarBusquedaD.php" method="POST">
                       <div class="form-group">
				<label for="nombre_departamento">NOMBRE DEPARTAMENTO:</label>
				<input required name="nombre_departamento" type="text" id="nombre_departamento" placeholder="nombre departamento" class="form-control">
			</div>
                    <br>
			<button type="submit" class="btn btn-success">ACEPTAR</button>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>