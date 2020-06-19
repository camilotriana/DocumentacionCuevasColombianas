<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_fauna"])) {
    exit();
}

$id_fauna = $_GET["id_fauna"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_fauna, nombre_fauna, n_poblacion, peligro, id_cueva, id_especie FROM fauna WHERE id_fauna = ?;");
$sentencia->execute([$id_fauna]);
$fauna = $sentencia->fetchObject();
if (!$fauna) {
    #No existe
    echo "¡No existe algun lugar con ese ID!";
    exit();
}

?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR FAUNA</h1>
                <br><br>
                <form action="ActualizarFauna.php" method="POST">
			<input type="hidden" name="id_fauna" value="<?php echo $fauna->id_fauna; ?>">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input value="<?php echo $fauna->nombre_fauna; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
                        <div class="form-group">
				<label for="n_poblacion">NUMERO DE POBLACION</label>
				<input value="<?php echo $fauna->n_poblacion; ?>" required name="n_poblacion" type="text" id="n_poblacion" placeholder="Numero de poblacion" class="form-control">
			</div>
			<div class="form-group">
				<label for="peligro">PELIGRO</label>
                                <input value="<?php echo $fauna->peligro; ?>" required name="peligro" type="text" id="peligro" placeholder="peligro" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_cueva">ID CUEVA</label>
                                <input value="<?php echo $fauna->id_cueva; ?>" required name="id_cueva" type="number" id="id_cueva" placeholder="id cueva" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_especie">ID ESPECIE</label>
                                <input value="<?php echo $fauna->id_especie; ?>" required name="id_especie" type="number" id="id_especie" placeholder="id especie" class="form-control">
			</div>
                        
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php"?>