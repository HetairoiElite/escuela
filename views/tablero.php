<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
?>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Tablero</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Usuarios</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>
                                    <?php

                                    $consulta = "SELECT * from usuarios;";

                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();
                                    echo $resultado->rowCount();

                                    ?>
                                </span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Alumnos</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>

                                    <?php

                                    $consulta = "SELECT * from usuarios where tipousu = 3;";

                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();
                                    echo $resultado->rowCount();

                                    ?>
                                </span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-graduation-cap fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Docentes</span></div>
                            <div class="row g-0 align-items-center">
                                <div class="col-auto">
                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span>
                                            <?php

                                            $consulta = "SELECT * from usuarios where tipousu = 2;";

                                            $resultado = $conexion->prepare($consulta);
                                            $resultado->execute();
                                            echo $resultado->rowCount();

                                            ?>
                                        </span></div>
                                </div>
                                <div class="col">
                                    <!-- <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="visually-hidden">50%</span></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-user-graduate fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Administrativos</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>
                                    <?php

                                    $consulta = "SELECT * from usuarios where tipousu = 1;";

                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();
                                    echo $resultado->rowCount();

                                    ?>
                                </span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-hammer fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Materias</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>
                                    <?php

                                    $consulta = "SELECT * from materias;";

                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();
                                    echo $resultado->rowCount();

                                    ?>
                                </span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-book fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>