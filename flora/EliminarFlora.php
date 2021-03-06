<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_flora"])) {
    exit();
}

$id_flora = $_GET["id_flora"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM flora WHERE id_flora = ?;");
$resultado = $sentencia->execute([$id_flora]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
