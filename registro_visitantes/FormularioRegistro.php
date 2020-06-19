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
		<h1>AGREGAR REGISTRO DE VISITANTE</h1>
                <br><br>
                <form action="InsertarRegistro.php" method="POST">
                       <div class="form-group">
                        <label for="id_registro">ID REGISTRO</label>
			<input required name="id_registro" type="number" id="id_registro" placeholder="id_registro" class="form-control">
			<div class="form-group">
				<label for="fecha">FECHA</label>
				<input required name="fecha" type="date" id="fecha" placeholder="fecha" class="form-control">
			</div>
			<div class="form-group">
				<label for="hora_entrada">HORA ENTRADA</label>
				<input required name="hora_entrada" type="time" id="hora_entrada" placeholder="hora entrada" class="form-control">
			</div>
                        <div class="form-group">
				<label for="hora_salida">HORA SALIDA</label>
				<input required name="hora_salida" type="time" id="hora_salida" placeholder="hora salida" class="form-control">
			</div>
                        <div class="form-group">
				<label for="valor_ingreso">VALOR INGRESO</label>
				<input required name="valor_ingreso" type="number" id="valor_ingreso" placeholder="valor_ingreso" class="form-control">
			</div>
                        <label for="id_visitante">ID VISITANTE</label>
			<input required name="id_visitante" type="number" id="id_visitante" placeholder="id visitante" class="form-control">
                        <br>
                        <label for="id_cueva">ID CUEVA</label>
			<input required name="id_cueva" type="number" id="id_cueva" placeholder="id cueva" class="form-control">
			<br>
                        <button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
    <br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php" ?>