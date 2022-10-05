<?php

session_start();

include_once "conexion.php";

$objeto = new Conexion();
$conexion = $objeto->Conectar();

switch ($_POST['boton']) {
    case 'Usuarios':
        $id = $_POST['id'];

        $consulta = "SELECT * FROM usuarios 
        WHERE id = '$id'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        if ($resultado->rowCount() >= 1) {
            $data = $resultado->fetch(PDO::FETCH_ASSOC);
            print json_encode($data);
        } else {
            $data = "error";
            print json_encode($data);
        }



        break;
    case 'Alumnos':


        $id = $_POST['id'];

        $consulta = "SELECT * FROM alumnos inner join direcciones on alumnos.direccion = direcciones.id
        WHERE alumnos.matricula = '$id'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        if ($resultado->rowCount() >= 1) {
            $data = $resultado->fetch(PDO::FETCH_ASSOC);
            print json_encode($data);
        } else {
            $data = "error";
            print json_encode($data);
        }

        break;

    case "Docentes":

        $id = $_POST['id'];

        $consulta = "SELECT * FROM empleado inner join direcciones on empleado.direccion = direcciones.id
        WHERE empleado.clave_empleado = '$id'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        if ($resultado->rowCount() >= 1) {
            $data = $resultado->fetch(PDO::FETCH_ASSOC);
            print json_encode($data);
        } else {
            $data = "error";
            print json_encode($data);
        }
        break;
    case "Administrativos":
        $id = $_POST['id'];

        $consulta = "SELECT * FROM empleado inner join direcciones on empleado.direccion = direcciones.id
        WHERE empleado.clave_empleado = '$id'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        if ($resultado->rowCount() >= 1) {
            $data = $resultado->fetch(PDO::FETCH_ASSOC);
            print json_encode($data);
        } else {
            $data = "error";
            print json_encode($data);
        }
        break;

    default:
        # code...
        break;
}
