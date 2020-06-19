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
if (!isset($_POST["id_especie"]) ||!isset($_POST["nombre"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_especie=$_POST["id_especie"];
$nombre = $_POST["nombre"];


/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */



try{
$sentencia = $base_de_datos->prepare("INSERT INTO especie_flora(id_especie, nombre_especieflora) VALUES (?, ?);");
$resultado = $sentencia->execute([$id_especie, $nombre]); # Pasar en el mismo orden de los ?  

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
                window.location= 'FormularioEFlora.php'
    </script>";  
}