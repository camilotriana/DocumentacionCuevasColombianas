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
		<h1>AGREGAR IMPLEMENTO DE SEGURIDAD</h1>
                <br><br>
                <form action="InsertarImplemento.php" method="POST">
                       <div class="form-group">
				<label for="id_implemento">ID IMPLEMENTO </label>
				<input required name="id_implemento" type="number" id="id_implemento" placeholder="id implemento" class="form-control">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="nivel_prioridad">NIVEL DE PRIORIDAD</label>
				<input required name="nivel_prioridad" type="text" id="nivel_prioridad" placeholder="nivel prioridad" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_visitante">ID VISITANTE</label>
				<input required name="id_visitante" type="number" id="id_visitante" placeholder="id visitante" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
    <br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php" ?>