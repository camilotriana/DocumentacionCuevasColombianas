<?php
/*
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id_implemento"])) {
    exit();
}

$id_implemento = $_GET["id_implemento"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_implemento, nombre, nivel_prioridad, id_visitante FROM implementos_seguridad WHERE id_implemento = ?;");
$sentencia->execute([$id_implemento]);
$implemento = $sentencia->fetchObject();
if (!$implemento) {
    #No existe
    echo "¡No existe algun lugar con ese ID!";
    exit();
}

?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>EDITAR IMPLEMENTO DE SEGURIDAD</h1>
                <br><br>
                <form action="ActualizarImplemento.php" method="POST">
			<input type="hidden" name="id_implemento" value="<?php echo $implemento->id_implemento; ?>">
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input value="<?php echo $implemento->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="nivel_prioridad">NIVEL DE PRIORIDAD</label>
                                <input value="<?php echo $implemento->nivel_prioridad; ?>" required name="nivel_prioridad" type="text" id="nivel_prioridad" placeholder="nivel de prioridad" class="form-control">
			</div>
                        <div class="form-group">
				<label for="id_visitante">ID VISITANTE</label>
                                <input value="<?php echo $implemento->id_visitante; ?>" required name="id_visitante" type="number" id="id_visitante" placeholder="id visitante" class="form-control">
			</div>
                        
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php"?>