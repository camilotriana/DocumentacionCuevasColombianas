<?php
if (!isset($_POST["nombre_departamento"])) {
    exit();
}
else{
$nombre_departamento = $_POST["nombre_departamento"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT c.nombre_cueva, c.longitud,c.latitud,l.nombre_ciudad,l.nombre_departamento,fl.nombre_flora,ef.nombre_especieflora,fa.nombre_fauna,efa.nombre_especiefauna,t.nombre_tipo FROM cuevas c, lugar l, flora fl, especie_flora ef, fauna fa, especie_fauna efa, tipo_cueva t WHERE c.id_lugar=l.id_lugar and c.id_cueva=fl.id_cueva and c.id_cueva=fa.id_cueva and fl.id_especie=ef.id_especie and fa.id_especie=efa.id_especie and c.id_tipo=t.id_tipo and l.nombre_departamento = ?;");
$resultado = $sentencia->execute([$nombre_departamento]);
# Abajo iteramos
}
?>
<div class="row">
    <link rel="stylesheet" type="text/css" href="styles/tables.css" media="screen" />
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>INFORMACION DE CUEVAS EN COLOMBIA</h1>
		<br>
		<table border="1" class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NOMBRE CUEVA</th>
					<th>LONGITUD</th>
                                        <th>LATITUD</th>
                                        <th>CIUDAD</th>
                                        <th>DEPARTAMENTO</th>
                                        <th>FLORA</th>
                                        <th>ESPECIE DE FLORA</th>
                                        <th>FAUNA</th>
                                        <th>ESPECIE DE FAUNA</th>
                                        <th>TIPO DE CUEVA</th>
				</tr>
			</thead>
			<tbody>
				<!--
					Y aquí usamos el ciclo while y fetchObject, el cuerpo
					del ciclo queda intacto pero ahora estamos usando
					cursores :)
				-->
				<?php while ($busD = $sentencia->fetchObject()){ ?>
					<tr>
						<td><?php echo $busD->nombre_cueva ?></td>
                                                <td><?php echo $busD->longitud ?></td>
                                                <td><?php echo $busD->latitud ?></td>
                                                <td><?php echo $busD->nombre_ciudad ?></td>
						<td><?php echo $busD->nombre_departamento ?></td>
                                                <td><?php echo $busD->nombre_flora ?></td>
                                                <td><?php echo $busD->nombre_especieflora ?></td>
                                                <td><?php echo $busD->nombre_fauna ?></td>
                                                <td><?php echo $busD->nombre_especiefauna ?></td>
                                                <td><?php echo $busD->nombre_tipo ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
         <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Usuario.php">VOLVER A LA PAGINA PRINCIPAL</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<?php include_once "pie.php" ?>
