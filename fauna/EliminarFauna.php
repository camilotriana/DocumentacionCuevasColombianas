<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_fauna"])) {
    exit();
}

$id_fauna = $_GET["id_fauna"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM fauna WHERE id_fauna = ?;");
$resultado = $sentencia->execute([$id_fauna]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
