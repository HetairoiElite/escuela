<?php

session_start();

switch ($_POST['pagina']) {
    case 'Tablero':
        $_SESSION['pagina'] = 'Tablero';
        print json_encode('success');
        break;
    case 'Perfil':
        $_SESSION['pagina'] = 'Perfil';
        print json_encode('success');
        break;
    case 'PerfilContacto':
        $_SESSION['pagina'] = 'PerfilContacto';
        print json_encode('change');
        break;

    case 'Usuarios':
        $_SESSION['pagina'] = 'Usuarios';
        print json_encode('success');
        break;
    case 'NuevoUsuario':
        $_SESSION['pagina'] = 'NuevoUsuario';
        print json_encode('success');
        break;

    case 'Alumnos':
        $_SESSION['pagina'] = 'Alumnos';
        print json_encode('success');
        break;
    case 'NuevoAlumno':
        $_SESSION['pagina'] = 'NuevoAlumno';
        print json_encode('success');
        break;
    case 'Docentes':
        $_SESSION['pagina'] = 'Docentes';
        print json_encode('success');
        break;
    case 'NuevoDocente':
        $_SESSION['pagina'] = 'NuevoDocente';
        print json_encode('success');
        break;
    case 'Administrativos':
        $_SESSION['pagina'] = 'Administrativos';
        print json_encode('success');
        break;
    case 'NuevoAdministrativo':
        $_SESSION['pagina'] = 'NuevoAdministrativo';
        print json_encode('success');
        break;
    case 'Materias':
        $_SESSION['pagina'] = 'Materias';
        print json_encode('success');
        break;
    default:
        print json_encode("error");
        break;
}
