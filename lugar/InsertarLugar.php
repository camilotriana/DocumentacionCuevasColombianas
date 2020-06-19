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
if (!isset($_POST["id_lugar"]) ||!isset($_POST["nombre_ciudad"]) || !isset($_POST["nombre_departamento"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_lugar=$_POST["id_lugar"];
$nombre_ciudad = $_POST["nombre_ciudad"];
$nombre_departamento = $_POST["nombre_departamento"];

/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
# Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar
try{
$sentencia = $base_de_datos->prepare("INSERT INTO lugar(id_lugar, nombre_ciudad, nombre_departamento) VALUES (?, ?, ?);");
$resultado = $sentencia->execute([$id_lugar, $nombre_ciudad, $nombre_departamento]);
if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
}catch(Exception $e){
    echo "<script>
                alert('Error el Id ingresado ya existe');
                window.location= 'FormularioLugar.php'
    </script>";  
}
