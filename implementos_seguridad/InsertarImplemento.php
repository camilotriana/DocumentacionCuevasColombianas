<?php
/*
================================
Este archivo inserta los datos 
enviados a través de formulario.php
================================
*/
?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["id_implemento"]) ||!isset($_POST["nombre"]) || !isset($_POST["nivel_prioridad"]) 
           || !isset($_POST["id_visitante"])) {
    
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_visitante=$_POST["id_visitante"];
$id_implemento=$_POST["id_implemento"];
$nombre = $_POST["nombre"];
$nivel_prioridad = $_POST["nivel_prioridad"];


/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */


try{
$sentencia = $base_de_datos->prepare("INSERT INTO implementos_seguridad(id_implemento, nombre, nivel_prioridad, id_visitante) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_implemento, $nombre, $nivel_prioridad, $id_visitante]); # Pasar en el mismo orden de los ?

#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
    
} catch (Exception $ex) {
echo "<script>
                alert('Error el Id ingresado ya existe o error de relacion');
                window.location= 'FormularioImplemento.php'
    </script>";  
}