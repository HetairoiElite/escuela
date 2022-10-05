<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

switch ($_SESSION['idtipousu']) {
    case 1:
        $tipousu = $_SESSION['idtipousu'];
        $idUser = $_SESSION['idUser'];
        $consulta = "SELECT * FROM usuarios inner join empleado on 
        usuarios.id = empleado.usuario where usuarios.tipousu = $tipousu and usuarios.id = $idUser";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dataUsuario = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $idDireccion = $dataUsuario[0]['direccion'];

        $consulta = "SELECT * FROM direcciones where id = $idDireccion";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dataDireccion = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}


?>


<div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>

    <div class="container-fluid">
        <h3 class="text-dark mb-4">Profile</h3>
        <div class="row mb-3">
            <!-- <div class="col-lg-4">
                <!-- <div class="card mb-3">
                    <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
                    </div>
                </div> -->
            <!-- <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary fw-bold m-0">Projects</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small fw-bold">Server migration<span class="float-end">20%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="visually-hidden">20%</span></div>
                        </div>
                        <h4 class="small fw-bold">Sales tracking<span class="float-end">40%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="visually-hidden">40%</span></div>
                        </div>
                        <h4 class="small fw-bold">Customer Database<span class="float-end">60%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="visually-hidden">60%</span></div>
                        </div>
                        <h4 class="small fw-bold">Payout Details<span class="float-end">80%</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="visually-hidden">80%</span></div>
                        </div>
                        <h4 class="small fw-bold">Account setup<span class="float-end">Complete!</span></h4>
                        <div class="progress progress-sm mb-3">
                            <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->
            <div class="col-lg-12">
                <div class="row mb-3 d-none">
                    <div class="col">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">User Settings</p>
                            </div>
                            <div class="card-body">
                                <form id="formEditarPerfil" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="usuario"><strong>Usuario</strong></label><input class="form-control" type="text" id="usuario" placeholder="user@example.com" name="usuario"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="password"><strong>Email Address</strong></label><input class="form-control" type="password" id="password" placeholder="Contraseña" name="password"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="nombre"><strong>Nombre</strong></label><input class="form-control" type="text" id="nombre" placeholder="Nombre" name="nombre"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="apellidoP"><strong>Apellido Paterno</strong></label><input class="form-control" type="text" id="apellidoP" placeholder="Apellido paterno" name="apellidoP"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="apellidoM"><strong>Apellido Materno</strong></label><input class="form-control" type="text" id="apellidoM" placeholder="Apellido materno" name="apellidoM"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Guardar cambios</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Ajustes de contacto</p>
                            </div>
                            <div class="card-body">
                                <form>
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

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="cp_response">Código Postal Respuesta:</label>
                                                <input type="text" name="cp_response" id="cp_response" class="form-control" disabled readonly>
                                                <input type="hidden" name="cp_responseh" id="cp_responseh">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="list_colonias">Colonias:</label>
                                                <select name="list_colonias" id="list_colonias" class="form-control">
                                                    <option>Seleccione</option>
                                                </select>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="tipo_asentamiento">Tipo Asentamiento:</label>
                                                <input type="text" name="tipo_asentamiento" id="tipo_asentamiento" class="form-control" disabled readonly>
                                                <input type="hidden" name="tipo_asentamientoh" id="tipo_asentamientoh">
                                                <br>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="municipio">Municipio:</label>
                                                <input type="text" name="municipio" id="municipio" class="form-control" disabled readonly>
                                                <input type="hidden" name="municipioh" id="municipioh">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="estado">Estado:</label>
                                                <input type="text" name="estado" id="estado" class="form-control" disabled readonly>
                                                <input type="hidden" name="estadoh" id="estadoh">
                                                <br>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="ciudad">Ciudad:</label>
                                                <input type="text" name="ciudad" id="ciudad" class="form-control" disabled readonly>
                                                <input type="hidden" name="ciudadh" id="ciudadh">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">

                                                <label for="calle" class="form-label">Calle</label>
                                                <input type="text" name="calle" class="form-control" id="calle" placeholder="Calle">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="numero" class="form-label">Número</label>
                                                <input type="number" name="numero" class="form-control" id="numero" placeholder="Número">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Guardar cambios</button></div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>