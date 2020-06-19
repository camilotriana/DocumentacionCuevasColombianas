<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_registro"])) {
    exit();
}

$id_registro = $_GET["id_registro"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fecha, hora_entrada, hora_salida, valor_ingreso, id_visitante, id_cueva, id_registro FROM registro_visitantes WHERE id_registro = ?;");
$sentencia->execute([$id_registro]);
$registro = $sentencia->fetchObject();
if (!$registro) {
    #No existe
    echo "¡No existe algun registro con ese ID!";
    exit();
}
?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR REGISTRO VISITANTE</h1>
                <br><br>
		<form action="ActualizarRegistro.php" method="POST">
			<input type="hidden" name="id_registro" value="<?php echo $registro->id_registro; ?>">
			<div class="form-group">
				<label for="fecha">FECHA</label>
                                <input value="<?php echo $registro->fecha; ?>" required name="fecha" type="date" id="fecha" placeholder="fecha" class="form-control">
			</div>
			<div class="form-group">
				<label for="hora_entrada">HORA ENTRADA</label>
                                <input value="<?php echo $registro->hora_entrada; ?>" required name="hora_entrada" type="time" id="hora_entrada" placeholder="hora entrada" class="form-control">
			</div>
                        <div class="form-group">
				<label for="hora_salida">HORA SALIDA</label>
                                <input value="<?php echo $registro->hora_salida; ?>" required name="hora_salida" type="time" id="hora_salida" placeholder="hora salida" class="form-control">
			</div>
                        <div class="form-group">
				<label for="valor_ingreso">VALOR INGRESO</label>
                                <input value="<?php echo $registro->valor_ingreso; ?>" required name="valor_ingreso" type="number" id="valor_ingreso" placeholder="valor ingreso" class="form-control">
                        </div>
                        <div class="form-group">
				<label for="id_visitante">ID VISITANTE</label>
                                <input value="<?php echo $registro->id_visitante; ?>" required name="id_visitante" type="number" id="id_visitante" placeholder="id visitante" class="form-control">
                        </div>
                        <div class="form-group">
				<label for="id_cueva">ID CUEVA</label>
                                <input value="<?php echo $registro->id_cueva; ?>" required name="id_cueva" type="number" id="id_cueva" placeholder="id cueva" class="form-control">
                        </div>
                        
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php"?>