<?php 

include("../conexion/con_db.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['entrale'])) {
	if (isset($_GET['id'])) {
		$iduser = $_GET['id'];
	}else{
		$iduser=1;
	}
	$placa= trim($_POST['placa']);
	$tipo = trim($_POST['tipo']);
	$año = trim($_POST['año']);
	$chasis = trim($_POST['chasis']);
	$marca = trim($_POST['marca']);
	$industria = trim($_POST['industria']);
	$motor = trim($_POST['motor']);
	$modelo = trim($_POST['modelo']);
	$color = trim($_POST['color']);

	$cilindrada = trim($_POST['cilindrada']);
	$n_cilindros = trim($_POST['n_cilindros']);
	$combustible = trim($_POST['combustible']);
	$caja = trim($_POST['caja']);
	$traccion = trim($_POST['traccion']);
	$neumatico = trim($_POST['neumatico']);
	$observacion = trim($_POST['observaciones']);
	//consulta si existe ese tipo de caracteristicas
	$cosulta=mysqli_query($conex,"SELECT * FROM caracteristicas WHERE cilindrada = '$cilindrada' AND n_cilindros = '$n_cilindros' AND combustible = '$combustible' AND caja = '$caja' AND traccion = '$traccion' AND neumatico = '$neumatico'");
	if(mysqli_num_rows($cosulta)==1){
		//en caso de que exista se saca el id del registro
		$row = mysqli_fetch_array($cosulta);
		$idcart = $row['idcaracteristicas'];
		
		$c_registro=mysqli_query($conex,"SELECT * FROM registro_vehiculo WHERE placa = '$placa' ");
		//confirmar que el registro no exista
		if (mysqli_num_rows($c_registro)==1) {
			//si existe mandar un mensaje
			$_SESSION['message']='Error vehiculo ya esta registrado !!';
		    $_SESSION['message_type']='danger';
		    header("Location: form_registro.php");
		}
		else{
			//si el registro no existe se procede a registrarlo
			$reg = "INSERT INTO registro_vehiculo(idusuario, idcaracteristicas, placa, n_chasis, n_motor, tipo, marca, modelo, año_fab, industria, color, observaciones) VALUES ('$iduser', '$idcart','$placa','$chasis','$motor','$tipo','$marca','$modelo','$año','$industria','$color', '$observacion')";
			$resul= @mysqli_query($conex,$reg);
			if (!$resul) {
				die("Fallo al ingresar registro");
			} 
			$_SESSION['message']='Registro guardado correctamente!!';
		    $_SESSION['message_type']='success';
		    header("Location: form_registro.php");
		}
	}

	else{
		//en caso de que las caracteristicas no existan se registran
		$caracteristica = "INSERT INTO caracteristicas(cilindrada, n_cilindros, combustible, caja, traccion, neumatico) VALUES ('$cilindrada','$n_cilindros','$combustible','$caja','$traccion','$neumatico')";	
		$resultado = @mysqli_query($conex,$caracteristica);
		if (!$resultado) {
			die("Fallo al ingresar");
		} 
		//se procede a obtener el idCracteristicas
		$consul=mysqli_query($conex,"SELECT * FROM caracteristicas WHERE cilindrada = '$cilindrada' AND n_cilindros = '$n_cilindros' AND combustible = '$combustible' AND caja = '$caja' AND traccion = '$traccion' AND neumatico = '$neumatico'");
		$row = mysqli_fetch_array($consul);
		$idcart = $row['idcaracteristicas'];
		//se procede a verificar que el registro no exista
		$c_registro=mysqli_query($conex,"SELECT * FROM registro_vehiculo WHERE  placa = '$placa' ");
		//confirmar que el registro no exista
		if (mysqli_num_rows($c_registro)==1) {
			//si existe mandar un mensaje
			$_SESSION['message']='El registro ya existe!!';
		    $_SESSION['message_type']='primary';
		    header("Location: form_registro.php");
		}
		else{
			//si el registro no existe se procede a registrarlo
			$reg = "INSERT INTO registro_vehiculo(idusuario, idcaracteristicas, placa, n_chasis, n_motor, tipo, marca, modelo, año_fab, industria, color, observaciones) VALUES ('$iduser', '$idcart','$placa','$chasis','$motor','$tipo','$marca','$modelo','$año','$industria','$color', '$observacion')";
			$resul= @mysqli_query($conex,$reg);
			if (!$resul) {
				die("Fallo al ingresar registro");
			} 
			$_SESSION['message']='Registro guardado correctamente!!';
		    $_SESSION['message_type']='success';
		    header("Location: form_registro.php");
		}
	}
}
?>

<?php  require_once "vistas/parte_inferior.php" ?>