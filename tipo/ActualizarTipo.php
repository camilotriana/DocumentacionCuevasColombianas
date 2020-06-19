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
    !isset($_POST["id_tipo"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_tipo = $_POST["id_tipo"];
$nombre = $_POST["nombre"];

$sentencia = $base_de_datos->prepare("UPDATE tipo_cueva SET nombre_tipo = ? WHERE id_tipo = ?;");
$resultado = $sentencia->execute([$nombre, $id_tipo]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

