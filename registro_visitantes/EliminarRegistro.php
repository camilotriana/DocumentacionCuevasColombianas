<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_registro"])) {
    exit();
}

$id_registro = $_GET["id_registro"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM registro_visitantes WHERE id_registro = ?;");
$resultado = $sentencia->execute([$id_registro]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
