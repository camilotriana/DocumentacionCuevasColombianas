<?php
/*
================================
Este archivo inserta los datos 
enviados a través de formulariocueva.php
================================
*/
?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["id_cueva"]) ||!isset($_POST["nombre"]) || !isset($_POST["longitud"]) 
           || !isset($_POST["latitud"]) || !isset($_POST["id_lugar"]) || !isset($_POST["id_tipo"])) {
    
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_cueva=$_POST["id_cueva"];
$id_lugar=$_POST["id_lugar"];
$id_tipo=$_POST["id_tipo"];
$nombre = $_POST["nombre"];
$longitud = $_POST["longitud"];
$latitud =$_POST["latitud"];


/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */


try{
    $sentencia = $base_de_datos->prepare("INSERT INTO cuevas(id_cueva, nombre_cueva, longitud, latitud, id_lugar, id_tipo) VALUES (?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_cueva, $nombre, $longitud, $latitud, $id_lugar, $id_tipo]); # Pasar en el mismo orden de los ?

#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
    
} catch (Exception $ex) {
echo "<script>
                alert('Error el Id ingresado ya existe o posible error de relacion');
                window.location= 'FormularioCueva.php'
    </script>";  
}