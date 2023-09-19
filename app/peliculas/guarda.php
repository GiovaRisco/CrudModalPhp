<?php

session_start();

require("../config/database.php");

$nombre = $conn->real_escape_string($_POST["nombre"]);
$descripcion = $conn->real_escape_string($_POST["descripcion"]);
$genero = $conn->real_escape_string($_POST["genero"]);

$sql = mysqli_query($conn,"INSERT INTO pelicula (nombre,descripcion,id_genero) 
VALUES ('$nombre','$descripcion',$genero)");

if($sql != null){
    $id = $conn->insert_id;

    $_SESSION["msg"] = "Registro guardado";
    $_SESSION["color"] = "success";

    if($_FILES["poster"]["error"] == UPLOAD_ERR_OK){
        $permitidos = array("image/jpg","image/jpeg");
        if(in_array($_FILES["poster"]["type"], $permitidos)){
                $dir = "posters";

                $info_img = pathinfo($_FILES["poster"]["name"]);
                $info_img["extension"];

                $poster = $dir. "/".$id.$info_img["extension"];

                if(!file_exists($dir)){
                    mkdir($dir,0777);
                }

               if(!move_uploaded_file($_FILES["poster"]["tmp_name"],$poster)){
                $_SESSION["color"] = "danger";
                    $_SESSION["msg"] .= "<br>Error al guardar imagen";
               } 
        }else{
            $_SESSION["color"] = "danger";
            $_SESSION["msg"] .= "<br>Formato de imagen no permitido";
        }
    }
}else{
    $_SESSION["color"] = "danger";
    $_SESSION["msg"] = "Error al guardar imagen";
}

header("location: index.php");