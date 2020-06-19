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
if (!isset($_POST["id_tipo"]) ||!isset($_POST["nombre"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_tipo=$_POST["id_tipo"];
$nombre = $_POST["nombre"];


/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */



try{
$sentencia = $base_de_datos->prepare("INSERT INTO tipo_cueva(id_tipo, nombre_tipo) VALUES (?, ?);");
$resultado = $sentencia->execute([$id_tipo, $nombre]); # Pasar en el mismo orden de los ?  

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
    
} catch (Exception $ex) {
echo "<script>
                alert('Error el Id ingresado ya existe');
                window.location= 'FormularioTipo.php'
    </script>";  
}

