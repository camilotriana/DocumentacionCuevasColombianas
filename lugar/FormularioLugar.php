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
		<h1>AGREGAR LUGAR</h1>
                <br><br>
		<form action="InsertarLugar.php" method="POST">
                       <div class="form-group">
				<label for="id_lugar">ID LUGAR</label>
				<input required name="id_lugar" type="number" id="id_lugar" placeholder="id lugar" class="form-control">
			<div class="form-group">
				<label for="nombre_ciudad">NOMBRE CIUDAD</label>
				<input required name="nombre_ciudad" type="text" id="nombre_ciudad" placeholder="Nombre ciudad" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre_departamento">NOMBRE DEPARTAMENTO</label>
				<input required name="nombre_departamento" type="text" id="nombre_departamento" placeholder="Nombre departamento" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
    <br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php" ?>