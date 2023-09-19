<?php
require("../config/database.php");

$id = $conn->real_escape_string($_POST["id"]);

$sql = mysqli_query($conn,"SELECT * FROM pelicula WHERE id='$id' LIMIT 1");

$pelicula = [];

if($sql != null)
{
    $pelicula = $sql->fetch_array();
}
echo json_encode($pelicula,JSON_UNESCAPED_UNICODE);
