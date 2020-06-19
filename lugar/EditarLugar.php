<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_lugar"])) {
    exit();
}

$id_lugar = $_GET["id_lugar"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_lugar, nombre_ciudad, nombre_departamento FROM lugar WHERE id_lugar = ?;");
$sentencia->execute([$id_lugar]);
$lugar = $sentencia->fetchObject();
if (!$lugar) {
    #No existe
    echo "¡No existe algun lugar con ese ID!";
    exit();
}

?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR LUGAR</h1>
                <br><br>
		<form action="ActualizarLugar.php" method="POST">
			<input type="hidden" name="id_lugar" value="<?php echo $lugar->id_lugar; ?>">
			<div class="form-group">
				<label for="nombre_ciudad">NOMBRE CIUDAD</label>
				<input value="<?php echo $lugar->nombre_ciudad; ?>" required name="nombre_ciudad" type="text" id="nombre_ciudad" placeholder="Nombre ciudad" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre_departamento">NOMBRE DEPARTAMENTO</label>
				<input value="<?php echo $lugar->nombre_departamento; ?>" required name="nombre_departamento" type="text" id="nombre_departamento" placeholder="Nombre departamento" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php"?>