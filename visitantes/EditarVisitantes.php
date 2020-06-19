<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_visitante"])) {
    exit();
}

$id_visitante = $_GET["id_visitante"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_visitante, nombre, apellido, rh, celular, direccion FROM visitantes WHERE id_visitante = ?;");
$sentencia->execute([$id_visitante]);
$visitante = $sentencia->fetchObject();
if (!$visitante) {
    #No existe
    echo "¡No existe algun lugar con ese ID!";
    exit();
}
?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR VISITANTE</h1>
                <br><br>
                <form action="ActualizarVisitantes.php" method="POST">
			<input type="hidden" name="id_visitante" value="<?php echo $visitante->id_visitante; ?>">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input value="<?php echo $visitante->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="apellido">APELLIDO</label>
				<input value="<?php echo $visitante->apellido; ?>" required name="apellido" type="text" id="apellido" placeholder="apellido" class="form-control">
			</div>
                        <div class="form-group">
				<label for="rh">RH</label>
				<input value="<?php echo $visitante->rh; ?>" required name="rh" type="text" id="rh" placeholder="rh" class="form-control">
			</div>
                        <div class="form-group">
				<label for="celular">CELULAR</label>
                                <input value="<?php echo $visitante->celular; ?>" required name="celular" type="number" id="celular" placeholder="celular" class="form-control">
			</div>
                        <div class="form-group">
				<label for="direccion">DIRECCION</label>
                                <input value="<?php echo $visitante->direccion; ?>" required name="direccion" type="text" id="direccion" placeholder="direccion" class="form-control">
			</div>
                        
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php"?>