<?php
/*
================================
Este archivo muestra un formulario que
se envía a insertar.php, el cual guardará
los datos
================================
*/
?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>AGREGAR FLORA</h1>
                <br><br>
                <form action="InsertarFlora.php" method="POST">
                       <div class="form-group">
				<label for="id_flora">ID FLORA </label>
				<input required name="id_flora" type="number" id="id_flora" placeholder="id flora" class="form-control">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="peligro">PELIGRO</label>
				<input required name="peligro" type="text" id="peligro" placeholder="peligro" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_cueva">ID CUEVA</label>
				<input required name="id_cueva" type="number" id="id_cueva" placeholder="id cueva" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_especie">ID ESPECIE</label>
				<input required name="id_especie" type="number" id="id_especie" placeholder="id especie" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
    <br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php" ?>