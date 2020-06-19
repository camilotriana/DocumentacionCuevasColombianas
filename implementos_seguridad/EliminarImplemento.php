<?php
/*
================================
Este archivo elimina un dato por ID sin
pedir confirmación. El ID viene de la URL
================================
*/
if (!isset($_GET["id_implemento"])) {
    exit();
}

$id_implemento = $_GET["id_implemento"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM implementos_seguridad WHERE id_implemento = ?;");
$resultado = $sentencia->execute([$id_implemento]);
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal";
}
