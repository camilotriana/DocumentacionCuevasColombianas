<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_tipo"])) {
    exit();
}

$id_tipo = $_GET["id_tipo"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_tipo, nombre_tipo FROM tipo_cueva WHERE id_tipo = ?;");
$sentencia->execute([$id_tipo]);
$tipo = $sentencia->fetchObject();
if (!$tipo) {
    #No existe
    echo "¡No existe algun tipo de cueva con ese ID!";
    exit();
}
?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR TIPO DE CUEVA</h1>
                <br><br>
		<form action="ActualizarTipo.php" method="POST">
			<input type="hidden" name="id_tipo" value="<?php echo $tipo->id_tipo; ?>">
			<div class="form-group">
				<label for="nombre">NOMBRE </label>
				<input value="<?php echo $tipo->nombre_tipo; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php"?>