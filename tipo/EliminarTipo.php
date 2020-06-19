<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_tipo"])) {
    exit();
}

$id_tipo = $_GET["id_tipo"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM tipo_cueva WHERE id_tipo = ?;");
$resultado = $sentencia->execute([$id_tipo]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
