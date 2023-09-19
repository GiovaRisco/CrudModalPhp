<?php
session_start();
require("../config/database.php");
$id = $conn->real_escape_string($_POST["id"]);


$sql = mysqli_query($conn,"DELETE FROM pelicula WHERE id='$id'");

if($sql != null){
    $dir = "posters";
     $poster = $dir. "/".$id.$info_img["extension"];

    if(file_exists($poster)){
        unlink($poster);
    }
    $_SESSION["msg"] = "Registro eliminado";
    $_SESSION["color"] = "success";
}else{
    $_SESSION["msg"] = "Error al eliminar registro";
    $_SESSION["color"] = "danger";
}

header("location: index.php");