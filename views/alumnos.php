<div class="container-fluid">
    <h3 class="text-dark mb-4">Alumnos</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Info Alumnos</p>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-2 offset-10">
                    <div class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalAlumno" id="botonCrear">
                            <i class="fas fa-plus"></i> Crear
                        </button>
                    </div>
                </div>
            </div>
            <br />
            <br />

            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="datos_alumno" class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nombre completo</th>
                            <th>Teléfono</th>
                            <th>Usuario</th>
                            <th>Dirección</th>
                            <th>Grado y grupo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../db/conexion.php";
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();

                        $consulta = "SELECT matricula, concat(alumnos.nombre, ' ', apellidoP, ' ', apellidoM)
                                    as NombreCompleto, telefono, usuarios.correo as usuario,
                                    concat(calle,':',numero, ' ', colonia, ' ',municipio, ' ', estado, ':', ' CP: ', codigo_postal) as direccion,
                                    concat(grado, '', grupo) as gradogrupo FROM alumnos
                                    inner join usuarios on usuarios.id = alumnos.id_usuario
                                    inner join direcciones on alumnos.direccion = direcciones.id
                                    inner join grupos_grados on grupos_grados.id = alumnos.grado_grupo
                                    inner join tipo_usuarios on usuarios.tipousu = tipo_usuarios.id
                                    ORDER BY usuarios.id";

                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();


                        if ($resultado->rowCount() > 0) {
                            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data as $dat) { ?>
                                <tr>
                                    <td><?php echo $dat['matricula']; ?></td>
                                    <td><?php echo $dat['NombreCompleto']; ?></td>
                                    <td><?php echo $dat['telefono']; ?></td>
                                    <td><?php echo $dat['usuario']; ?></td>
                                    <td><?php echo $dat['direccion']; ?></td>
                                    <td><?php echo $dat['gradogrupo']; ?></td>
                                    <?php if ($_SESSION['tipousu'] == "Administrador") { ?>
                                        <td>
                                            <form action="" id="formEditarAlu<?php echo $dat['matricula'] ?>" method="POST" class="confirmar d-inline">
                                                <input type="hidden" name="boton" id="boton<?php echo $dat['matricula'] ?>" value="Alumnos">
                                                <input type="hidden" id="<?php echo $dat['matricula']; ?>" value="<?php echo $dat['matricula']; ?>">
                                                <button class="btn btn-warning" name="boton" value="Alumnos" type="submit"><i class='fas fa-edit'></i> Editar</button>
                                                <!-- <input class="btn btn-danger" type="submit"> -->
                                            </form>

                                            <form action="" id="formEliminarAlu<?php echo $dat['matricula'] ?>" method="POST" class="confirmar d-inline">
                                                <input type="hidden" name="boton" id="boton<?php echo $dat['matricula'] ?>" value="Alumnos">
                                                <input type="hidden" id="<?php echo $dat['matricula']; ?>" value="<?php echo $dat['matricula']; ?>">
                                                <button class="btn btn-danger" name="boton" value="Alumnos" type="submit"><i class='fas fa-trash-alt'></i> Eliminar</button>
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
    <div class="modal fade" id="modalAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" id="formulario" enctype="multipart/form-data">

                            <label for="nombre">Ingrese el nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            <br />

                            <label for="apellidoP">Ingrese el apellido paterno</label>
                            <input type="text" name="apellidoP" id="apellidoP" class="form-control" placeholder="Apellido paterno">
                            <br />

                            <label for="apellidoM">Ingrese el apellido materno</label>
                            <input type="text" name="apellidoM" id="apellidoM" class="form-control" placeholder="Apellido materno">
                            <br />

                            <!--Telefono-->
                            <label for="telefono">Ingrese el teléfono</label>
                            <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Teléfono">

                            <!-- <label for="telefono">Ingrese el teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control">
                            <br /> -->


                            <?php

                            $consulta = "SELECT id, correo FROM usuarios WHERE tipousu = 3";

                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();

                            ?>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Selecciona un usuario</label>
                                <select class="form-select" id="usuario" name="usuario" aria-label="Default select example">
                                    <option selected value="0">Usuario</option>
                                    <?php

                                    while ($r = $resultado->fetch(PDO::FETCH_ASSOC)) {


                                    ?>
                                        <option value="<?php echo $r['id'] ?>"> <?php echo $r['id'] . " : " .  $r['correo'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                            <?php

                            $consultagg = "SELECT * FROM grupos_grados";

                            $resultadogg = $conexion->prepare($consultagg);
                            $resultadogg->execute();

                            ?>

                            <div class="mb-4">
                                <label for="grado y grupo" class="form-label">Selecciona grado y grupo</label>
                                <select class="form-select" id="gp" name="gp" aria-label="Default select example">
                                    <option selected>Grado y grupo</option>
                                    <?php

                                    while ($r = $resultadogg->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $r['id'] . "'>" . $r['grado'] . " " . $r['grupo'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-1">
                                <h6 class="text">Dirección</h6>
                                <!-- Gradient divider -->
                                <hr data-content="AND" class="hr-text">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Código Postal:</span>
                                </div>
                                <input type="text" class="form-control" name="codigo_postal" id="codigo_postal">
                            </div>
                            <div class="mb-3">
                                <a href="javascript:void(0)" onclick="informacion_cp()" class="btn btn-primary">Obtener información Código Postal</a>
                                <br />
                            </div>




                            <label for="cp_response">Código Postal Respuesta:</label>
                            <input type="text" name="cp_response" id="cp_response" class="form-control" disabled readonly>
                            <input type="hidden" name="cp_responseh" id="cp_responseh">
                            <br>

                            <label for="list_colonias">Colonias:</label>
                            <select name="list_colonias" id="list_colonias" class="form-control">
                                <option>Seleccione</option>
                            </select>
                            <br>

                            <label for="tipo_asentamiento">Tipo Asentamiento:</label>
                            <input type="text" name="tipo_asentamiento" id="tipo_asentamiento" class="form-control" disabled readonly>
                            <input type="hidden" name="tipo_asentamientoh" id="tipo_asentamientoh">
                            <br>

                            <label for="municipio">Municipio:</label>
                            <input type="text" name="municipio" id="municipio" class="form-control" disabled readonly>
                            <input type="hidden" name="municipioh" id="municipioh">
                            <br>

                            <label for="estado">Estado:</label>
                            <input type="text" name="estado" id="estado" class="form-control" disabled readonly>
                            <input type="hidden" name="estadoh" id="estadoh">
                            <br>

                            <label for="ciudad">Ciudad:</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" disabled readonly>
                            <input type="hidden" name="ciudadh" id="ciudadh">
                            <br>

                            <div class="mb-3">

                                <label for="calle" class="form-label">Ingrese la calle</label>
                                <input type="text" name="calle" class="form-control" id="calle" placeholder="Calle">
                            </div>

                            <div class="mb-3">
                                <label for="numero" class="form-label">Ingrese el número</label>
                                <input type="number" name="numero" class="form-control" id="numero" placeholder="Número">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_alumno" id="id_alumno">
                        <input type="hidden" name="operacion" id="operacion">
                        <input type="hidden" name="boton" id="boton" value="Alumnos">

                        <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>