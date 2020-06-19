<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_visitante"])) {
    exit();
}

$id_visitante = $_GET["id_visitante"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM visitantes WHERE id_visitante = ?;");
$resultado = $sentencia->execute([$id_visitante]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
