<?php

session_start();

include_once "conexion.php";

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = isset($_POST['id_alumno']) ? $_POST['id_alumno'] : '';
if ($id == '') {
    $id = isset($_POST['id_docente']) ? $_POST['id_docente'] : '';
}

if ($id == '') {
    $id = isset($_POST['id_admin']) ? $_POST['id_admin'] : '';
}

$boton = isset($_POST['boton']) ? $_POST['boton'] : '';

if ($id == '') {
} else {

    switch ($boton) {
        case 'Alumnos':

            $usuarios = array();

            $consulta = "SELECT usuarios.id as id_usuario, correo FROM usuarios inner join tipo_usuarios
            on usuarios.tipousu = tipo_usuarios.id
            WHERE tipo_usuarios.id = '3'";

            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $consultausualu = "SELECT id_usuario FROM alumnos where matricula = '$id'";

            $resultado = $conexion->prepare($consultausualu);
            $resultado->execute();
            $dataalu = $resultado->fetch(PDO::FETCH_ASSOC);

            foreach ($data as $dat) {
                $consultaalu = "SELECT * from alumnos where id_usuario = '" . $dat['id_usuario'] . "'";
                $resultadoalu = $conexion->prepare($consultaalu);
                $resultadoalu->execute();


                if (($resultadoalu->rowCount() == 0) || $dat['id_usuario'] == $dataalu['id_usuario']) {
                    $usuarios[] = $dat;
                }
            }

            print json_encode($usuarios);
            break;
        case 'Administrativos':

            $usuarios = array();

            $consulta = "SELECT usuarios.id as id_usuario, correo FROM usuarios inner join tipo_usuarios
            on usuarios.tipousu = tipo_usuarios.id
            WHERE tipo_usuarios.id = '1'";

            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $consultausuem = "SELECT usuario as id_usuario FROM empleado where clave_empleado = '$id'";

            $resultado = $conexion->prepare($consultausuem);
            $resultado->execute();
            $dataem = $resultado->fetch(PDO::FETCH_ASSOC);

            foreach ($data as $dat) {
                $consultaem = "SELECT * from empleado where usuario = '" . $dat['id_usuario'] . "'";
                $resultadoem = $conexion->prepare($consultaem);
                $resultadoem->execute();


                if (($resultadoem->rowCount() == 0) || $dat['id_usuario'] == $dataem['id_usuario']) {
                    $usuarios[] = $dat;
                }
            }

            print json_encode($usuarios);
            break;
        case 'Docentes':

            $usuarios = array();

            $consulta = "SELECT usuarios.id as id_usuario, correo FROM usuarios inner join tipo_usuarios
            on usuarios.tipousu = tipo_usuarios.id
            WHERE tipo_usuarios.id = '2'";

            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $consultausuadmin = "SELECT usuario as id_usuario FROM empleado where clave_empleado = '$id'";

            $resultado = $conexion->prepare($consultausuadmin);
            $resultado->execute();
            $dataadmin = $resultado->fetch(PDO::FETCH_ASSOC);

            foreach ($data as $dat) {
                $consultaadmin = "SELECT * from empleado where usuario = '" . $dat['id_usuario'] . "'";
                $resultadoadmin = $conexion->prepare($consultaadmin);
                $resultadoadmin->execute();


                if (($resultadoadmin->rowCount() == 0) || $dat['id_usuario'] == $dataadmin['id_usuario']) {
                    $usuarios[] = $dat;
                }
            }

            print json_encode($usuarios);
            break;

        default:
            # code...
            break;
    }
}
