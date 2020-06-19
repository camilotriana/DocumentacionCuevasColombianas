<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_especie"])) {
    exit();
}

$id_especie = $_GET["id_especie"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_especie, nombre_especiefauna FROM especie_fauna WHERE id_especie = ?;");
$sentencia->execute([$id_especie]);
$efauna = $sentencia->fetchObject();
if (!$efauna) {
    #No existe
    echo "¡No existe alguna especie con ese ID!";
    exit();
}
?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR ESPECIE DE FAUNA</h1>
                <br><br>
		<form action="ActualizarEFauna.php" method="POST">
			<input type="hidden" name="id_especie" value="<?php echo $efauna->id_especie; ?>">
			<div class="form-group">
				<label for="nombre">NOMBRE </label>
				<input value="<?php echo $efauna->nombre_especiefauna; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php"?>