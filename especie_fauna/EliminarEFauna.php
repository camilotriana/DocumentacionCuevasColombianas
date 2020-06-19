<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_especie"])) {
    exit();
}

$id_especie = $_GET["id_especie"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM especie_fauna WHERE id_especie = ?;");
$resultado = $sentencia->execute([$id_especie]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
