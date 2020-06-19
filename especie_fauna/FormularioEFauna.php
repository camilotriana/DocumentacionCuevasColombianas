<?php
/*
================================
Este archivo muestra un formulario que
se envía a insertar.php, el cual guardará
los datos
================================
*/
?>

<div class="row">
    <link rel="stylesheet" type="text/css" href="../styles/label.css" media="screen" />
	<div class="col-12">
            <br><br>
		<h1>AGREGAR ESPECIE DE FAUNA</h1>
                <br><br>
		<form action="InsertarEFauna.php" method="POST">
                       <div class="form-group">
				<label for="id_especie">ID ESPECIE DE FAUNA</label>
				<input required name="id_especie" type="number" id="id_especie" placeholder="id especie fauna" class="form-control">
			<div class="form-group">
				<label for="nombre">NOMBRE ESPECIE DE FAUNA</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../Listar.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<br><br>
<?php include_once "../Encabezado.php" ?>
<?php include_once "../pie.php" ?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

