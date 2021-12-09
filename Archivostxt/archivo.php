<?php 

    // Diseñe un programa en PHP que permita la creación de archivos de textos TXT y la creación de directorios.
    // enviar por la plataforma el archivo txt con la url  del github al igual que la  url del host de la aplicación.

    if(isset($_POST['btn']) && $_POST['btn']=='Crear Archivo'){
        //Para crear el directorio y validar su existencia
        $miCarpeta = htmlspecialchars($_POST['titulodir']);
        $miRuta = htmlspecialchars($_POST['titulorut']);

        $miDirectorio = $miRuta.$miCarpeta;

        if(!is_dir($miDirectorio)){
            $crear = mkdir($miDirectorio, 0777, true);
            if($crear){
                echo "Se ha creado su directorio $miDirectorio satisfactoriamente";
            } else echo "Error al crear el directorio";
        } else echo "El directorio ya existe";

        //Para crear archivos txt dentro del directorio
        $archivo = $miDirectorio."./".$_POST['titulo'].".txt";
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];

        $escribir = fopen($archivo, "w") or die("Error al crear el archivo");

        fwrite($escribir, $titulo.":\n");
        fwrite($escribir, $contenido);

        fclose($escribir);


    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorios</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <br><br>
    <a href="index.html">Volver</a>
</body>
</html>
