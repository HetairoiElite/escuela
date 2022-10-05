<?php
session_start();
include_once('conexion.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//print_r($conexion);
//recibir los datos que envian por el POST
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = md5((isset($_POST['password'])) ? $_POST['password'] : '');
//encriptas la  contraseña
//$pass=md5($password);
$consulta = "SELECT usuarios.id as idUser, nombre, tipo_usuarios.id as idtipousu FROM usuarios inner join tipo_usuarios on tipousu = tipo_usuarios.id
 WHERE correo='$usuario' AND password='$password'";




$resultado = $conexion->prepare($consulta);
$resultado->execute();
if ($resultado->rowCount() >= 1) {
	$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION['idUser'] = $data[0]['idUser'];
	$_SESSION['nusuario'] = $usuario;
	$_SESSION['tipousu'] = $data[0]['nombre'];
	$_SESSION['idtipousu'] = $data[0]['idtipousu'];
	$_SESSION['pagina'] = "Nada";

	if ($_SESSION['tipousu'] != "Alumno") {

		$consulta1 = "SELECT concat(nombre ,' ', apellidoP, ' ', apellidoM) as nombreCompleto
		FROM empleado inner join usuarios on usuarios.id = empleado.usuario where correo = '$usuario'";

		$resultado1 = $conexion->prepare($consulta1);
		$resultado1->execute();

		$data1 = $resultado1->fetchAll(PDO::FETCH_ASSOC);

		$_SESSION['nombreusu'] = $data1[0]['nombreCompleto'];
	} else {
		$consulta1 = "SELECT concat(nombre ,' ', apellidoP, ' ', apellidoM) as nombreCompleto
		FROM alumnos inner join usuarios on usuarios.id = alumnos.id_usuario where
		correo = '$usuario'";

		$resultado1 = $conexion->prepare($consulta1);
		$resultado1->execute();


		$data1 = $resultado1->fetchAll(PDO::FETCH_ASSOC);

		$_SESSION['nombreusu'] = $data1[0]['nombreCompleto'];
	}
} else {
	$_SESSION['nusuario'] = null;
	$data = "error";
}
print json_encode($data);
$conexion = null;
