<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_lugar"])) {
    exit();
}

$id_lugar = $_GET["id_lugar"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM lugar WHERE id_lugar = ?;");
$resultado = $sentencia->execute([$id_lugar]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
