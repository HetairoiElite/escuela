<?php
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-success p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><img src="../assets/img/login/logo.png" alt="" width="50px"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Escuelita</span></div>
                </a>

                <hr class="sidebar-divider my-0" />

                <ul id="accordionSidebar" class="navbar-nav text-light">

                    <li class="nav-item"><a id="Dashboard" class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a id="Perfil" class="nav-link" href="#"><i class="fas fa-address-card"></i><span>Perfil</span></a></li>

                    <li class="nav-item"><a id="Usuarios" class="nav-link" href="#"><i class="fas fa-user"></i><span>Usuarios</span></a></li>

                    <li class="nav-item"><a id="Alumnos" class="nav-link" href="#"><i class="fas fa-graduation-cap"></i><span>Alumnos</span></a></li>

                    <li class="nav-item"><a id="Docentes" class="nav-link" href="#"><i class="fas fa-user-graduate"></i><span>Docentes</span></a></li>

                    <li class="nav-item"><a id="Administrativos" class="nav-link" href="#"><i class="fas fa-hammer"></i><span>Administrativos</span></a></li>

                    <li class="nav-item"><a id="Materias" class="nav-link" href="#"><i class="fas fa-book"></i><span>Materias</span></a></li>
                </ul>

                <div class="text-center d-none d-md-inline"><button id="sidebarToggle" class="btn rounded-circle border-0" type="button"></button></div>

            </div>
        </nav>


        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>

                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" style="cursor: default;" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['tipousu']; ?></span></a>

                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['nusuario']; ?></span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a id="Perfil" class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../db/cerrar.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Start includes -->

                <?php
                switch ($_SESSION['pagina']) {

                    case 'Dashboard':
                        include_once 'dashboard.php';
                        break;
                    case 'Perfil':
                        include_once 'profile.php';
                        break;
                    case 'Usuarios':
                        include_once 'usuarios.php';
                        break;
                    case 'Materias':
                        include_once 'materias.php';
                        break;
                    case 'Alumnos':
                        include_once 'alumnos.php';
                        break;
                    case 'Docentes':
                        include_once 'docentes.php';
                        break;
                    case 'Administrativos':
                        include_once 'administrativos.php';
                        break;

                    default:
                        include_once 'dashboard.php';
                        break;
                }
                ?>

                <!-- End Includes -->

                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                    </div>
                </footer>

            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
            <!-- end main -->

        </div>


        <script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>

        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bs-init.js"></script>
        <script src="../assets/js/theme.js"></script>

        <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../js/menu.js"></script>

        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables.bootstrap4.min.js"></script>
        <script src="../js/borrar.js"></script>

        <script type="text/javascript" src="../js/plugins/sweetalert2.all.min.js"></script>


        <!--Scripts de editar y crear de cada modulo -->

        <?php
        switch ($_SESSION['pagina']) {
            case 'Usuarios':
                echo '<script type="text/javascript" src="../js/usuarios.js"></script>';
                break;
            case 'Materias':
                echo '<script type="text/javascript" src="../js/materias.js"></script>';
                break;
            case 'Alumnos':
                echo '<script type="text/javascript" src="../js/alumnos.js"></script>';
                break;
            case 'Docentes':
                echo '<script type="text/javascript" src="../js/docentes.js"></script>';
                break;
            case 'Administrativos':
                echo '<script type="text/javascript" src="../js/administrativos.js"></script>';
                break;
            default:

                break;
        }
        ?>

        <script type="text/javascript" src="../js/cp.js"></script>
        <script type="text/javascript" src="../js/editarPerfil.js"></script>
        <script type="text/javascript" src="../js/editarDireccionUsu.js"></script>


</body>

</html>