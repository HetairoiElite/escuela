<?php
session_start();

include_once "conexion.php";

$objeto = new Conexion();
$conexion = $objeto->Conectar();

switch ($_POST['boton']) {
    case 'Usuarios':
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';

        $consulta = "SELECT * FROM usuarios 
        WHERE id = '$usuario'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($resultado->rowCount() > 1) {
            $data = "warning";
            print json_encode($data);
        } else {
            $consulta1 = "DELETE FROM usuarios WHERE id = '$usuario'";

            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute();

            $data = "success";
            print json_encode($data);
        }
        break;
    case 'Materias':
        $materia = isset($_POST['materia']) ? $_POST['materia'] : '';

        $consulta = "SELECT * FROM materias 
        WHERE id = '$materia'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($resultado->rowCount() > 1) {
            $data = "warning";
            print json_encode($data);
        } else {
            $consulta1 = "DELETE FROM materias WHERE id = '$materia'";

            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute();

            $data = "success";
            print json_encode($data);
        }
        break;
    case 'Alumnos':
        $alumno = isset($_POST['alumno']) ? $_POST['alumno'] : '';

        $consulta = "SELECT * FROM alumnos 
        WHERE matricula = '$alumno'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($resultado->rowCount() > 1) {
            $data = "warning";
            print json_encode($data);
        } else {
            $consulta1 = "DELETE FROM alumnos WHERE matricula = '$alumno'";

            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute();

            $data = "success";
            print json_encode($data);
        }
        break;

    case 'Docentes':
        $docente = isset($_POST['docente']) ? $_POST['docente'] : '';

        $consulta = "SELECT * FROM empleado 
        WHERE clave_empleado = '$docente'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($resultado->rowCount() > 1) {
            $data = "warning";
            print json_encode($data);
        } else {
            $consulta1 = "DELETE FROM empleado WHERE clave_empleado = '$docente'";

            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute();

            $data = "success";
            print json_encode($data);
        }
        break;
    case 'Administrativos':
        $admin = isset($_POST['admin']) ? $_POST['admin'] : '';

        $consulta = "SELECT * FROM empleado 
            WHERE clave_empleado = '$admin'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($resultado->rowCount() > 1) {
            $data = "warning";
            print json_encode($data);
        } else {
            $consulta1 = "DELETE FROM empleado WHERE clave_empleado = '$admin'";

            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute();

            $data = "success";
            print json_encode($data);
        }
        break;

    default:
        # code...
        break;
}
