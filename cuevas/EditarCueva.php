<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_cueva"])) {
    exit();
}

$id_cueva = $_GET["id_cueva"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_cueva, nombre_cueva, longitud, latitud, id_lugar, id_tipo FROM cuevas WHERE id_cueva = ?;");
$sentencia->execute([$id_cueva]);
$cueva = $sentencia->fetchObject();
if (!$cueva) {
    #No existe
    echo "¡No existe algun lugar con ese ID!";
    exit();
}

?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR CUEVA</h1>
                <br><br>
		<form action="ActualizarCueva.php" method="POST">
			<input type="hidden" name="id_cueva" value="<?php echo $cueva->id_cueva; ?>">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input value="<?php echo $cueva->nombre_cueva; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="longitud">LONGITUD</label>
				<input value="<?php echo $cueva->longitud; ?>" required name="longitud" type="text" id="longitud" placeholder="longitud" class="form-control">
			</div>
                        <div class="form-group">
				<label for="latitud">LATITUD</label>
				<input value="<?php echo $cueva->latitud; ?>" required name="latitud" type="text" id="latitud" placeholder="latitud" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_lugar">ID LUGAR</label>
                                <input value="<?php echo $cueva->id_lugar; ?>" required name="id_lugar" type="number" id="id_lugar" placeholder="id lugar" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_tipo">ID TIPO</label>
                                <input value="<?php echo $cueva->id_tipo; ?>" required name="id_tipo" type="number" id="id_tipo" placeholder="id tipo" class="form-control">
			</div>
                        
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php"?>
<?php include_once "../pie.php"?>