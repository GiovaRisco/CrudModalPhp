<?php

session_start();
require("../config/database.php");
include("../includes/header.php");
$selectPelicula = mysqli_query($conn, "SELECT p.id,p.nombre,p.descripcion,g.nombre as genero FROM pelicula AS p
        inner join genero g
        on p.id_genero=g.id;");
$dir  = "posters/"
?>


<div class="container py-3">
    <h2 class="text-center">Peliculas</h2>
    <hr>
    <?php
    if (isset($_SESSION["msg"]) && isset($_SESSION["color"])) { ?>
        <div class="alert alert-<?= $_SESSION["color"] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION["msg"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
</div>
<?php
        unset($_SESSION["color"]);
        unset($_SESSION["msg"]);
    } ?>
<div class="container">
    <div class="row justify-content-end">
        <div class="col-auto">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">
                <i class="fa-solid fa-circle-plus"></i> Nuevo Registro</a>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Genero</th>
                <th>Poter</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($selectPelicula as $row_peli) { ?>
                <tr>

                    <td><?php echo $row_peli["id"] ?></td>
                    <td><?php echo $row_peli["nombre"] ?></td>
                    <td><?php echo $row_peli["descripcion"] ?></td>
                    <td><?php echo $row_peli["genero"] ?></td>
                    <td><img src="<?= $dir . $row_peli["id"] . 'jpg?n='.time(); ?>" alt="" width="100px"></td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning" data-bs-id="<?= $row_peli["id"] ?>" data-bs-toggle="modal" data-bs-target="#editaModal"><i class="fa-solid fa-pen"></i>
                            Editar</a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-id="<?= $row_peli["id"] ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal"><i class="fa-solid fa-trash"></i>
                            Elimar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php

$selectGenero = mysqli_query($conn, "SELECT * FROM genero;")

?>

<?php
include "nuevoModal.php";
include "editaModal.php";
include "eliminaModal.php";
include("../includes/footer.php") ?>