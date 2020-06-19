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
		<h1>AGREGAR VISITANTE</h1>
                <br><br>
                <form action="InsertarVisitantes.php" method="POST">
                       <div class="form-group">
				<label for="id_visitante">ID VISITANTE</label>
				<input required name="id_visitante" type="number" id="id_visitante" placeholder="id visitante" class="form-control">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="apellido">APELLIDO</label>
				<input required name="apellido" type="text" id="apellido" placeholder="apellido" class="form-control">
			</div>
                        <div class="form-group">
				<label for="rh">RH</label>
				<input required name="rh" type="text" id="rh" placeholder="rh" class="form-control">
			</div>
                        <div class="form-group">
				<label for="celular">CELULAR</label>
				<input required name="celular" type="number" id="celular" placeholder="celular" class="form-control">
			</div>
                        <div class="form-group">
				<label for="direccion">DIRECCION</label>
				<input required name="direccion" type="text" id="direccion" placeholder="direccion" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
    <br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php" ?>