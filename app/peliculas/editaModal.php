<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actualiza.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <textarea type="text" name="descripcion" id="descripcion" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Genero:</label>
                        <select name="genero" id="genero" class="form-control">
                            <option value="">Seleccionar..</option>
                            <?php
                            foreach ($selectGenero as $row_genero) { ?>
                                <option value="<?php echo $row_genero["id"]; ?>"><?= $row_genero["nombre"]
                                                                                    ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <img id="img_poster" width="100" class="img-thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster:</label>
                        <input type="file" name="poster" id="poster" class="form-control" accept="image/jpeg" >
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>