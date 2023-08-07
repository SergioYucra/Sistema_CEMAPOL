<?php 
include("../conexion/con_db.php");
date_default_timezone_set("America/La_Paz");

if (isset($_POST['entrale'])) {	
	$id=trim($_POST['idNro']);
	$lugar= trim($_POST['lugar']);
	$fecha = date("d/m/y");
	$hora = date("H:i A");
	$unidad = trim($_POST['unidad']);
	$ciudad = trim($_POST['ciudad']);
	$responsable = trim($_POST['responsable']);
	$funcionario = trim($_POST['funcionario']);
	$engrase = "";
	$limpieza ="";

	$op1= "";
	$op2= "";
	$op3= "";
	$op4= "";
	if (isset($_POST['op1'])) {
		$op1= trim($_POST['op1']);
		$engrase= $engrase."[".$op1."]"." ";
	}
	if (isset($_POST['op2'])) {
		$op2= trim($_POST['op2']);
		$engrase= $engrase."[".$op2."]"." ";
	}
	if (isset($_POST['op3'])) {
		$op3= trim($_POST['op3']);
		$engrase= $engrase."[".$op3."]"." ";
	}
	if (isset($_POST['op4'])) {
		$op4= trim($_POST['op4']);
		$engrase= $engrase."[".$op4."]"." ";
	}	
	
	$opc1= "";
	$opc2= "";
	$opc3= "";
	if (isset($_POST['opc1'])) {
		$opc1= trim($_POST['opc1']);
		$limpieza=$limpieza."[".$opc1."]"." ";
	}
	if (isset($_POST['opc2'])) {
		$opc2= trim($_POST['opc2']);
		$limpieza=$limpieza."[".$opc2."]"." ";
	}
	if (isset($_POST['opc3'])) {
		$opc3= trim($_POST['opc3']);
		$limpieza=$limpieza."[".$opc3."]"." ";
	}
	$a_motor = trim($_POST['a_motor']);
	$a_caja = trim($_POST['a_caja']);
	$a_trasmision = trim($_POST['a_trasmision']);
	$engrase =trim($engrase);
	$limpieza= trim($limpieza);	

 	//INGRESO DE DATOS GENERALES
	$reg = "INSERT INTO datos_generales(lugar ,fecha ,hora ,unidad ,ciudad ) VALUES ('$lugar', '$fecha','$hora','$unidad','$ciudad')";
	$resul= @mysqli_query($conex,$reg);
	if (!$resul) {
		die("Fallo al ingresar datos generales");
	}
	//SACAR EL ID DEL DATO 
	$cosulta=mysqli_query($conex,"SELECT * FROM datos_generales WHERE lugar = '$lugar' AND fecha = '$fecha' AND hora = '$hora' AND unidad = '$unidad' AND ciudad = '$ciudad'");
	if(mysqli_num_rows($cosulta)==1){
		$row = mysqli_fetch_array($cosulta);
		$idDato = $row['iddatos_generales'];
		//INGRESAR DATOS DE DE MANTENIMIENTO PREVENTIVO
		$man = "INSERT INTO mant_preventivo(idregistro_vehiculo, iddatos_generales,ca_motor ,ca_caja ,ca_transmision ,engrase,limpieza ,funcionario,responsable) VALUES ('$id','$idDato','$a_motor','$a_caja','$a_trasmision','$engrase','$limpieza','$funcionario','$responsable')";	
		$resultado = @mysqli_query($conex,$man);
		if (!$resultado) {
			die("Fallo al ingresar");
		} 
		//sacar el id del resgistro realizado
		$con=mysqli_query($conex,"SELECT * FROM mant_preventivo WHERE idregistro_vehiculo = '$id' AND iddatos_generales = '$idDato' AND ca_motor = '$a_motor' AND ca_caja = '$a_caja' AND ca_transmision = '$a_trasmision' AND engrase = '$engrase' AND limpieza = '$limpieza' AND funcionario = '$funcionario' AND responsable = '$responsable' ");
		$row = mysqli_fetch_array($con);
		$idMant = $row['idmant_preventivo'];
		
		//header("Location: pdf_preventivo.php?lug=$lugar");
		header("Location: verificacion.php?mant=$idMant");
	}
}

?>

<?php  require_once "vistas/parte_inferior.php" ?>