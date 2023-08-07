<?php 
include("../conexion/con_db.php");
date_default_timezone_set("America/La_Paz");
$sis_motor="";
$sis_mecanico="";
$sis_electrico="";
$estructura="";
if (isset($_POST['entrale'])) {	
	$idV=trim($_POST['idV']);
	$lugar= trim($_POST['lugar']);
	$fecha = date("d/m/y");
	$hora = date("H:i A");
	$unidad = trim($_POST['unidad']);
	$ciudad = trim($_POST['ciudad']);
	$responsable = trim($_POST['responsable']);
	$funcionario = trim($_POST['funcionario']);
	$detalle = trim($_POST['detalle']);
	if (isset($_POST['op'])) {
		foreach ($_POST['op'] as $valor) {
			$sis_motor = $sis_motor."[".$valor."]"." ";
			$sis_motor =trim($sis_motor);
		}
	}
	if (isset($_POST['opc'])) {
		foreach ($_POST['opc'] as $val) {
			$sis_mecanico = $sis_mecanico."[".$val."]"." ";
			$sis_mecanico =trim($sis_mecanico);
		}
	}
	if (isset($_POST['opci'])) {
		foreach ($_POST['opci'] as $val) {
			$sis_electrico = $sis_electrico."[".$val."]"." ";
			$sis_electrico=trim($sis_electrico);
		}
	}
	if (isset($_POST['opco'])) {
		foreach ($_POST['opco'] as $val) {
			$estructura = $estructura."[".$val."]"." ";
			$estructura =trim($estructura);
		}
	}

	
	
	//INGRESO DE DATOS GENERALES
	$reg = "INSERT INTO datos_generales(lugar ,fecha ,hora ,unidad ,ciudad ) VALUES ('$lugar', '$fecha','$hora','$unidad','$ciudad')";
	$resul= @mysqli_query($conex,$reg);
	if (!$resul) {
		die("Fallo al ingresar datos generales");
	}

	$cosulta=mysqli_query($conex,"SELECT * FROM datos_generales WHERE lugar = '$lugar' AND fecha = '$fecha' AND hora = '$hora' AND unidad = '$unidad' AND ciudad = '$ciudad'");
	if(mysqli_num_rows($cosulta)==1){
		$row = mysqli_fetch_array($cosulta);
		$idDato = $row['iddatos_generales'];
	}
	
	$man = "INSERT INTO mant_correctivo(idregistro_vehiculo, iddatos_generales,sis_motor ,sis_mecanico ,sis_electrico ,estructura, detalle,funcionario,responsable) VALUES ('$idV','$idDato','$sis_motor','$sis_mecanico','$sis_electrico','$estructura','$detalle' ,'$funcionario','$responsable')";	
		$resultado = @mysqli_query($conex,$man);
		if (!$resultado) {
			die("Fallo al ingresar datos de mantenimiento");
		} 
	//sacar el id del resgistro realizado
		$con=mysqli_query($conex,"SELECT * FROM mant_correctivo WHERE idregistro_vehiculo = '$idV' AND iddatos_generales = '$idDato'");
		$row = mysqli_fetch_array($con);
		$idMant = $row['idmant_correctivo'];
		
		//header("Location: pdf_preventivo.php?lug=$lugar");
		header("Location: verif_correctivo.php?mant=$idMant");
		
	
}
 ?>