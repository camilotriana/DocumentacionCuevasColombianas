<div class="row">
    <link rel="stylesheet" type="text/css" href="styles/label.css" media="screen" />
	<div class="col-12">
		<h1>BUSCAR CUEVA</h1>
                <br><br><br><br>
		<form action="ValidarBusqueda.php" method="POST">
                       <div class="form-group">
				<label for="nombre_cueva">NOMBRE DE LA CUEVA:</label>
				<input required name="nombre_cueva" type="text" id="nombre_cueva" placeholder="nombre cueva" class="form-control">
			</div>
                    <br>
			<button type="submit" class="btn btn-success">ACEPTAR</button>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>