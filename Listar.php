<?php
/*
================================
Este archivo lista todos los
datos de la tabla, obteniendo a
los mismos como un arreglo
================================
*/
?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("select id_lugar, nombre_ciudad, nombre_departamento from lugar");
$lugares = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia2 = $base_de_datos->query("select id_tipo, nombre_tipo from tipo_cueva");
$tipo = $sentencia2->fetchAll(PDO::FETCH_OBJ);
$sentencia3 = $base_de_datos->query("select id_cueva, nombre_cueva, longitud, latitud, id_lugar, id_tipo from cuevas");
$cueva = $sentencia3->fetchAll(PDO::FETCH_OBJ);
$sentencia4 = $base_de_datos->query("select id_especie, nombre_especieflora from especie_flora");
$eflora = $sentencia4->fetchAll(PDO::FETCH_OBJ);
$sentencia5 = $base_de_datos->query("select id_especie, nombre_especiefauna from especie_fauna");
$efauna = $sentencia5->fetchAll(PDO::FETCH_OBJ);
$sentencia6 = $base_de_datos->query("select id_flora, nombre_flora, peligro, id_cueva, id_especie from flora");
$flora = $sentencia6->fetchAll(PDO::FETCH_OBJ);
$sentencia7 = $base_de_datos->query("select id_fauna, nombre_fauna, n_poblacion, peligro, id_cueva, id_especie from fauna");
$fauna = $sentencia7->fetchAll(PDO::FETCH_OBJ);
$sentencia8 = $base_de_datos->query("select id_visitante, nombre, apellido, rh, celular, direccion from visitantes");
$visitantes = $sentencia8->fetchAll(PDO::FETCH_OBJ);
$sentencia9 = $base_de_datos->query("select id_implemento, nombre, nivel_prioridad, id_visitante from implementos_seguridad");
$implemento = $sentencia9->fetchAll(PDO::FETCH_OBJ);
$sentencia10 = $base_de_datos->query("select fecha, hora_entrada, hora_salida, valor_ingreso, id_visitante, id_cueva, id_registro from registro_visitantes");
$registro = $sentencia10->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->

<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
<div class="col-12">
		<h1>INFORMACION BASE DE DATOS</h1>
		
                <br><br>
                <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">TIPOS DE CUEVAS</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID TIPO</th>
                                                <th>NOMBRE TIPO</th>
                                                <th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tipo as $tip){ ?>
						<tr>
							<td><?php echo $tip->id_tipo ?></td>
							<td><?php echo $tip->nombre_tipo ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "tipo/EditarTipo.php?id_tipo=" . $tip->id_tipo?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "tipo/EliminarTipo.php?id_tipo=" . $tip->id_tipo?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                <br><br>
                <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">ESPECIES DE FLORA</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID ESPECIE</th>
                                                <th>NOMBRE ESPECIE</th>
                                                <th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($eflora as $efl){ ?>
						<tr>
							<td><?php echo $efl->id_especie ?></td>
							<td><?php echo $efl->nombre_especieflora ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "especie_flora/EditarEFlora.php?id_especie=" . $efl->id_especie?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "especie_flora/EliminarEFlora.php?id_especie=" . $efl->id_especie?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                <br><br>
                <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">ESPECIES DE FAUNA</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID ESPECIE</th>
                                                <th>NOMBRE ESPECIE</th>
                                                <th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($efauna as $efa){ ?>
						<tr>
							<td><?php echo $efa->id_especie ?></td>
							<td><?php echo $efa->nombre_especiefauna ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "especie_fauna/EditarEFauna.php?id_especie=" . $efa->id_especie?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "especie_fauna/EliminarEFauna.php?id_especie=" . $efa->id_especie?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                <br><br>
		<div class="table-responsive">
                    <table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                        <tr>
                                            <th colspan="5">LUGARES</th>
                                        </tr>
					<tr>
						<th>ID LUGAR</th>
						<th>CIUDAD</th>
						<th>DEPARTAMENTO</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($lugares as $lug){ ?>
						<tr>
							<td><?php echo $lug->id_lugar ?></td>
							<td><?php echo $lug->nombre_ciudad ?></td>
							<td><?php echo $lug->nombre_departamento ?></td>
							<td><a class="btn btn-warning" href="<?php echo "lugar/EditarLugar.php?id_lugar=" . $lug->id_lugar?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "lugar/EliminarLugar.php?id_lugar=" . $lug->id_lugar?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                <br><br>
                <div class="table-responsive">
			<table border="2"  class="table table-bordered">
				<thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th colspan="7">FLORA</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID FLORA</th>
                                                <th>NOMBRE FLORA</th>
                                                <th>PELIGRO</th>
                                                <th>ID CUEVA</th>
                                                <th>ID ESPECIE</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($flora as $flo){ ?>
						<tr>
							<td><?php echo $flo->id_flora ?></td>
							<td><?php echo $flo->nombre_flora ?></td>
                                                        <td><?php echo $flo->peligro ?></td>
                                                        <td><?php echo $flo->id_cueva ?></td>
                                                        <td><?php echo $flo->id_especie ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "flora/EditarFlora.php?id_flora=" . $flo->id_flora?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "flora/EliminarFlora.php?id_flora=" . $flo->id_flora?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                <br><br>
                <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th colspan="8">VISITANTES</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID VISITANTE</th>
                                                <th>NOMBRE</th>
                                                <th>APELLIDO</th>
						<th>RH</th>
                                                <th>CELULAR</th>
                                                <th>DIRECCION</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($visitantes as $vis){ ?>
						<tr>
							<td><?php echo $vis->id_visitante ?></td>
							<td><?php echo $vis->nombre ?></td>
                                                        <td><?php echo $vis->apellido ?></td>
                                                        <td><?php echo $vis->rh ?></td>
                                                        <td><?php echo $vis->celular ?></td>
                                                        <td><?php echo $vis->direccion ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "visitantes/EditarVisitantes.php?id_visitante=" . $vis->id_visitante?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "visitantes/EliminarVisitantes.php?id_visitante=" . $vis->id_visitante?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                 <br><br>
                <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th colspan="6">IMPLEMENTOS DE SEGURIDAD</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID IMPLEMENTO</th>
                                                <th>NOMBRE</th>
                                                <th>NIVEL DE PRIORIDAD</th>
                                                <th>ID VISITANTE</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($implemento as $imp){ ?>
						<tr>
							<td><?php echo $imp->id_implemento ?></td>
							<td><?php echo $imp->nombre ?></td>
                                                        <td><?php echo $imp->nivel_prioridad ?></td>
                                                        <td><?php echo $imp->id_visitante ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "implementos_seguridad/EditarImplemento.php?id_implemento=" . $imp->id_implemento?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "implementos_seguridad/EliminarImplemento.php?id_implemento=" . $imp->id_implemento?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                <br><br>
                <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th colspan="8">CUEVAS</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID CUEVA</th>
                                                <th>NOMBRE CUEVA</th>
                                                <th>LONGITUD</th>
						<th>LATITUD</th>
                                                <th>ID LUGAR</th>
                                                <th>ID TIPO</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($cueva as $cue){ ?>
						<tr>
							<td><?php echo $cue->id_cueva ?></td>
							<td><?php echo $cue->nombre_cueva ?></td>
                                                        <td><?php echo $cue->longitud ?></td>
                                                        <td><?php echo $cue->latitud ?></td>
                                                        <td><?php echo $cue->id_lugar ?></td>
                                                        <td><?php echo $cue->id_tipo ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "cuevas/EditarCueva.php?id_cueva=" . $cue->id_cueva?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "cuevas/EliminarCueva.php?id_cueva=" . $cue->id_cueva?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                 <br><br>
                <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th colspan="8">FAUNA</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>ID FAUNA</th>
                                                <th>NOMBRE FLORA</th>
                                                <th>NUMERO DE POBLACION</th>
                                                <th>PELIGRO</th>
                                                <th>ID CUEVA</th>
                                                <th>ID ESPECIE</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($fauna as $fau){ ?>
						<tr>
							<td><?php echo $fau->id_fauna ?></td>
							<td><?php echo $fau->nombre_fauna ?></td>
                                                        <td><?php echo $fau->n_poblacion ?></td>
                                                        <td><?php echo $fau->peligro ?></td>
                                                        <td><?php echo $fau->id_cueva ?></td>
                                                        <td><?php echo $fau->id_especie ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "fauna/EditarFauna.php?id_fauna=" . $fau->id_fauna?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "fauna/EliminarFauna.php?id_fauna=" . $fau->id_fauna?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
                 <br><br>
                 <div class="table-responsive">
			<table border="2" class="table table-bordered">
				<thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th colspan="9">REGISTROS</th>
                                        </tr>
					<tr>
					<tr>
                                                <th>FECHA</th>
                                                <th>HORA ENTRADA</th>
                                                <th>HORA SALIDA</th>
						<th>VALOR INGRESO</th>
                                                <th>ID VISITANTE</th>
                                                <th>ID CUEVA</th>
                                                <th>ID REGISTRO</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($registro as $reg){ ?>
						<tr>
							<td><?php echo $reg->fecha ?></td>
							<td><?php echo $reg->hora_entrada ?></td>
                                                        <td><?php echo $reg->hora_salida ?></td>
                                                        <td><?php echo $reg->valor_ingreso ?></td>
                                                        <td><?php echo $reg->id_visitante ?></td>
                                                        <td><?php echo $reg->id_cueva ?></td>
                                                        <td><?php echo $reg->id_registro ?></td>
                                                        <td><a class="btn btn-warning" href="<?php echo "registro_visitantes/EditarRegistro.php?id_registro=" . $reg->id_registro?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "registro_visitantes/EliminarRegistro.php?id_registro=" . $reg->id_registro?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "Encabezado2.php" ?>
<?php include_once "pie.php" ?>