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
    !isset($_POST["id_especie"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_especie = $_POST["id_especie"];
$nombre = $_POST["nombre"];

$sentencia = $base_de_datos->prepare("UPDATE especie_fauna SET nombre_especiefauna = ? WHERE id_especie = ?;");
$resultado = $sentencia->execute([$nombre, $id_especie]); # Pasar en el mismo orden de los ?
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
