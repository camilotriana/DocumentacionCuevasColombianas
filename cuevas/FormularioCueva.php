<?php
/*
================================
Este archivo muestra un formulario que
se envía a insertarcueva.php, el cual guardará
los datos
================================
*/
?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>AGREGAR CUEVA</h1>
                <br><br>
		<form action="InsertarCueva.php" method="POST">
                       <div class="form-group">
				<label for="id_cueva">ID CUEVA</label>
				<input required name="id_cueva" type="number" id="id_cueva" placeholder="id cueva" class="form-control">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="longitud">LONGITUD</label>
				<input required name="longitud" type="text" id="longitud" placeholder="Longitud" class="form-control">
			</div>
                        <div class="form-group">
				<label for="latitud">LATITUD</label>
				<input required name="latitud" type="text" id="latitud" placeholder="latitud" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_lugar">ID LUGAR</label>
				<input required name="id_lugar" type="number" id="id_lugar" placeholder="id lugar" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_tipo">ID TIPO</label>
				<input required name="id_tipo" type="number" id="id_tipo" placeholder="id tipo" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php" ?>