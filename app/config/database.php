<?php

$conn = mysqli_connect("localhost","root","admin2023$","cinema");

if($conn ->  connect_error){
    die("Error de conexion". $conn->connect_error);
}