<?php

session_start();

include_once "conexion.php";

$objeto = new Conexion();
$conexion = $objeto->Conectar();

switch ($_POST['boton']) {
    case 'Usuarios':
        $id = $_POST['id_usuario'];
        $correo = $_POST['email'];
        $tipousu = $_POST['tipousu'];
        $password = md5($_POST['password']);


        $consulta = "SELECT * FROM usuarios 
        WHERE correo = '$correo' and tipousu = '$tipousu'
        and password = '$password' and id = '$id'";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($resultado->rowCount() >= 1) {
            $data = "warning";
            print json_encode($data);
        } else {
            $consulta1 = "UPDATE usuarios set password = ?,correo = ?,tipousu = ? where id = '$id'";

            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute([$password, $correo, $tipousu]);



            if ($resultado1) {
                $data = "success";
                print json_encode($data);
            } else {
                $data = "error";
                print json_encode($data);
            }
        }



        break;
    case 'Alumnos':

        $id = $_POST['id_alumno'];
        $nombre = $_POST['nombre'];
        $apellidop = $_POST['apellidoP'];
        $apellidom = $_POST['apellidoM'];
        $telefono = $_POST['telefono'];
        $usuario = $_POST['usuario'];
        $gradogrupo = $_POST['gp'];

        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $colonia = $_POST['list_colonias'];
        $municipio = $_POST['municipioh'];
        $estado = $_POST['estadoh'];
        $ciudad = isset($_POST['ciudadh']) ? $_POST['ciudadh'] : "";
        $tipo_asentamiento = $_POST['tipo_asentamientoh'];
        $cp = $_POST['cp_responseh'];

        $consulta = "SELECT * FROM direcciones WHERE calle = '$calle' AND numero = '$numero' AND colonia = '$colonia' AND municipio = '$municipio' AND estado = '$estado' AND ciudad = '$ciudad' AND tipo_asentamiento = '$tipo_asentamiento'  AND codigo_postal = '$cp'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if (!$resultado->rowCount() >= 1) {
            $consulta1 = "INSERT INTO direcciones (id,calle,numero,colonia,municipio,estado, ciudad, tipo_asentamiento, codigo_postal) VALUES (null,?,?,?,?,?,?,?,?)";
            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute([$calle, $numero, $colonia, $municipio, $estado, $ciudad, $tipo_asentamiento, $cp]);
        }

        $consulta2 = "SELECT id FROM direcciones WHERE calle = '$calle' AND numero = '$numero' AND colonia = '$colonia' AND municipio = '$municipio' AND estado = '$estado' AND ciudad = '$ciudad' AND tipo_asentamiento = '$tipo_asentamiento' AND codigo_postal = '$cp'";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();

        $data = $resultado2->fetchAll(PDO::FETCH_ASSOC);

        $direccion = $data[0]['id'];

        $consulta3 = "UPDATE alumnos SET nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom', telefono = '$telefono', direccion = '$direccion', grado_grupo = '$gradogrupo' WHERE matricula = '$id'";

        $resultado3 = $conexion->prepare($consulta3);
        $resultado3->execute();


        if ($resultado3) {
            $data = "success";
            print json_encode($data);
        } else {
            $data = "error";
            print json_encode($data);
        }

        break;

    case "Docentes":

        $id = $_POST['id_docente'];
        $nombre = $_POST['nombre'];
        $apellidop = $_POST['apellidoP'];
        $apellidom = $_POST['apellidoM'];
        $telefono = $_POST['telefono'];
        $usuario = $_POST['usuario'];
        $especialidad = $_POST['especialidad'];
        $cedula = $_POST['cedula'];

        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $colonia = $_POST['list_colonias'];
        $municipio = $_POST['municipioh'];
        $estado = $_POST['estadoh'];
        $ciudad = isset($_POST['ciudadh']) ? $_POST['ciudadh'] : "";
        $tipo_asentamiento = $_POST['tipo_asentamientoh'];
        $cp = $_POST['cp_responseh'];

        $consulta = "SELECT * FROM direcciones WHERE calle = '$calle' AND numero = '$numero' AND colonia = '$colonia' AND municipio = '$municipio' AND estado = '$estado' AND ciudad = '$ciudad' AND tipo_asentamiento = '$tipo_asentamiento' AND codigo_postal = '$cp'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if (!$resultado->rowCount() >= 1) {
            $consulta1 = "INSERT INTO direcciones (id,calle,numero,colonia,municipio,estado,ciudad,tipo_asentamiento,codigo_postal) VALUES (null,?,?,?,?,?,?,?,?)";
            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute([$calle, $numero, $colonia, $municipio, $estado, $ciudad, $tipo_asentamiento, $cp]);
        }

        $consulta2 = "SELECT id FROM direcciones WHERE calle = '$calle' AND numero = '$numero' AND colonia = '$colonia' AND municipio = '$municipio' AND estado = '$estado' AND ciudad = '$ciudad' AND tipo_asentamiento = '$tipo_asentamiento' AND codigo_postal = '$cp'";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();

        $data = $resultado2->fetchAll(PDO::FETCH_ASSOC);

        $direccion = $data[0]['id'];

        $consulta3 = "UPDATE empleado SET nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom', telefono = '$telefono', especialidad = '$especialidad', cedula = '$cedula', direccion = '$direccion' WHERE clave_empleado = '$id'";

        $resultado3 = $conexion->prepare($consulta3);
        $resultado3->execute();


        if ($resultado3) {
            $data = "success";
            print json_encode($data);
        } else {
            $data = "error";
            print json_encode($data);
        }
        break;
    case "Administrativos":
        $id = $_POST['id_admin'];
        $nombre = $_POST['nombre'];
        $apellidop = $_POST['apellidoP'];
        $apellidom = $_POST['apellidoM'];
        $telefono = $_POST['telefono'];
        $usuario = $_POST['usuario'];
        $especialidad = $_POST['especialidad'];
        $cedula = $_POST['cedula'];

        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $colonia = $_POST['list_colonias'];
        $municipio = $_POST['municipioh'];
        $estado = $_POST['estadoh'];
        $ciudad = isset($_POST['ciudadh']) ? $_POST['ciudadh'] : "";
        $tipo_asentamiento = $_POST['tipo_asentamientoh'];
        $cp = $_POST['cp_responseh'];

        $consulta = "SELECT * FROM direcciones WHERE calle = '$calle' AND numero = '$numero' AND colonia = '$colonia' AND municipio = '$municipio' AND estado = '$estado' AND ciudad = '$ciudad' AND tipo_asentamiento = '$tipo_asentamiento' AND codigo_postal = '$cp'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if (!$resultado->rowCount() >= 1) {
            $consulta1 = "INSERT INTO direcciones (id,calle,numero,colonia,municipio,estado, ciudad, tipo_asentamiento, codigo_postal) VALUES (null,?,?,?,?,?,?,?,?)";
            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute([$calle, $numero, $colonia, $municipio, $estado, $ciudad, $tipo_asentamiento, $cp]);
        }

        $consulta2 = "SELECT id FROM direcciones WHERE calle = '$calle' AND numero = '$numero' AND colonia = '$colonia' AND municipio = '$municipio' AND estado = '$estado' AND ciudad = '$ciudad' AND tipo_asentamiento = '$tipo_asentamiento' AND codigo_postal = '$cp'";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();

        $data = $resultado2->fetchAll(PDO::FETCH_ASSOC);

        $direccion = $data[0]['id'];

        $consulta3 = "UPDATE empleado SET nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom', telefono = '$telefono', especialidad = '$especialidad', cedula = '$cedula', direccion = '$direccion' WHERE clave_empleado = '$id'";

        $resultado3 = $conexion->prepare($consulta3);
        $resultado3->execute();


        if ($resultado3) {
            $data = "success";
            print json_encode($data);
        } else {
            $data = "error";
            print json_encode($data);
        }
        break;

    case "Materias":
        $id = $_POST["id_materia"];
        $nombre = $_POST["nombre"];

        $consulta = "SELECT * FROM materias where nombre = '$nombre' and id = $id";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        if ($resultado->rowCount() >= 1) {
            $data = "warning";
            print json_encode($data);
        } else {
            $consulta1 = "UPDATE materias set nombre = ? where id = $id";

            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute([$nombre]);



            if ($resultado1) {
                $data = "success";
                print json_encode($data);
            } else {
                $data = "error";
                print json_encode($data);
            }
        }

        break;
    case "Perfil":
        $correo = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellidop = $_POST['apellidoP'];
        $apellidom = $_POST['apellidoM'];
        $password = $_POST['password'];
        $tipousu = $_POST['tipousu'];
        $idusu = $_POST['idusu'];

        if ($password != "") {
            $password = md5($password);
            $consultaUsuarios = "UPDATE usuarios SET password = '$password' WHERE correo = '$correo'";
            $resultadoUsuarios = $conexion->prepare($consultaUsuarios);
            $resultadoUsuarios->execute();
        }

        switch ($tipousu) {
            case 3:
                $consulta = "UPDATE alumnos SET nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom' WHERE matricula = '$idusu'";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                break;
            case 2:
                $consulta = "UPDATE empleado SET nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom' WHERE clave_empleado = '$idusu' AND tipo_empleado = 1";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                break;
            case 1:
                $consulta = "UPDATE empleado SET nombre = '$nombre', apellidoP = '$apellidop', apellidoM = '$apellidom' WHERE clave_empleado = '$idusu' AND tipo_empleado = 2";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                break;
        }
        if ($resultado) {
            $data = "success";
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
