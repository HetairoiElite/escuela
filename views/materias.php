<div class="container-fluid">
    <h3 class="text-dark mb-4">Materias</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Info Materias</p>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-2 offset-10">
                    <div class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalMateria" id="botonCrear">
                            <i class="fas fa-plus"></i> Crear
                        </button>
                    </div>
                </div>
            </div>
            <br />
            <br />

            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="datos_materia" class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../db/conexion.php";
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();

                        $consulta = "SELECT  * from Materias;";

                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();


                        if ($resultado->rowCount() > 0) {
                            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data as $dat) { ?>
                                <tr>
                                    <td><?php echo $dat['id']; ?></td>
                                    <td><?php echo $dat['nombre']; ?></td>
                                    <?php if ($_SESSION['tipousu'] == "Administrador") { ?>
                                        <td>
                                            <form action="" id="formEditarMat<?php echo $dat['id'] ?>" method="POST" class="confirmar d-inline">
                                                <input type="hidden" name="boton" id="boton<?php echo $dat['id'] ?>" value="Materias">
                                                <input type="hidden" id="<?php echo $dat['id']; ?>" value="<?php echo $dat['id']; ?>">
                                                <button class="btn btn-warning" name="boton" value="Materias" type="submit"><i class='fas fa-edit'></i> Editar</button>
                                                <!-- <input class="btn btn-danger" type="submit"> -->
                                            </form>

                                            <form action="" id="formEliminarMat<?php echo $dat['id'] ?>" method="POST" class="confirmar d-inline">
                                                <input type="hidden" name="boton" id="boton<?php echo $dat['id'] ?>" value="Materias">
                                                <input type="hidden" id="<?php echo $dat['id']; ?>" value="<?php echo $dat['id']; ?>">
                                                <button class="btn btn-danger" name="boton" value="Materias" type="submit"><i class='fas fa-trash-alt'></i> Eliminar</button>
                                                <!-- <input class="btn btn-danger" type="submit"> -->
                                            </form>
                                        </td>
                                    <?php } ?>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalMateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" id="formulario" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- <label for="nombre">Ingrese el nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                            <br />

                            <label for="apellidos">Ingrese los apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control">
                            <br /> -->

                            <!-- <label for="telefono">Ingrese el teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control">
                            <br /> -->

                            <label for="nombre">Ingrese el nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            <br />
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="id_materia" id="id_materia">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="hidden" name="boton" id="boton" value="Materias">

                            <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


</div>