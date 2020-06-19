<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_cueva"])) {
    exit();
}

$id_cueva = $_GET["id_cueva"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM cuevas WHERE id_cueva = ?;");
$resultado = $sentencia->execute([$id_cueva]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
