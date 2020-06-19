<?php
/*
================================
Este archivo guarda los datos del formulario
en donde se editan
================================
*/
?>

<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["nombre"]) ||
    !isset($_POST["apellido"]) ||
    !isset($_POST["rh"]) ||
    !isset($_POST["celular"]) ||
    !isset($_POST["direccion"]) ||
    !isset($_POST["id_visitante"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_visitante = $_POST["id_visitante"];
$direccion = $_POST["direccion"];
$celular = $_POST["celular"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$rh = $_POST["rh"];

$sentencia = $base_de_datos->prepare("UPDATE visitantes SET nombre = ?, apellido = ?, rh = ?, celular = ?, direccion = ? WHERE id_visitante = ?;");
$resultado = $sentencia->execute([$nombre, $apellido, $rh, $celular, $direccion, $id_visitante]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
