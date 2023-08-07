<?php
include("../conexion/con_db.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['enviar'])) {
	$idV=trim($_POST['idV']);
	$lugar= trim($_POST['lugar']);
	$fecha = trim($_POST['fecha']);
	$hora = trim($_POST['hora']);
	$unidad = trim($_POST['unidad']);
	$ciudad = trim($_POST['ciudad']);
	$motivo = trim($_POST['motivo']);
	$responsable = trim($_POST['responsable']);
	$funcionario = trim($_POST['funcionario']);
	$s_mecanico= trim($_POST['s_mecanico']);
	$estruc = trim($_POST['estruc']);
	$pint_ext=trim($_POST['pintura']);
	$obser=trim($_POST['obser']);

	$vidrio=trim($_POST['vidrio']);
	$retrovisor=trim($_POST['retrovisor']);
	$radio=trim($_POST['radio']);
	$placac=trim($_POST['placac']);
	$faroles=trim($_POST['faroles']);
	$guiñadores=trim($_POST['guiñadores']);
	$volante=trim($_POST['volante']);
	$palanca=trim($_POST['palanca']);
	$llantas=trim($_POST['llantas']);
	$guar_fangos=trim($_POST['guar_fangos']);
	$limp_parabrisas=trim($_POST['limp_parabrisas']);

	$motor = trim($_POST['motor']);
	$sis_alimentacion = trim($_POST['sis_alimentacion']);
	$sis_refri = trim($_POST['sis_refri']);
	$sis_distribucion = trim($_POST['sis_distribucion']);
	$sis_lubri = trim($_POST['sis_lubri']);
	$sis_trans = trim($_POST['sis_trans']);
	$sis_freno = trim($_POST['sis_freno']);
	$sis_direc = trim($_POST['sis_direc']);
	$sis_susp = trim($_POST['sis_susp']);
	$tren_rota = trim($_POST['tren_rota']);
	$encendido = trim($_POST['encendido']);
	$arranque = trim($_POST['arranque']);
	$iluminacion = trim($_POST['iluminacion']);
	$observaciones = trim($_POST['observaciones']); 

	$cosulPartes=mysqli_query($conex,"SELECT * FROM partes WHERE vidrios = '$vidrio' AND retrovisores = '$retrovisor' AND radio = '$radio' AND placa_control = '$placac' AND faroles = '$faroles' AND guiñadores = '$guiñadores' AND volante = '$volante' AND palanca = '$palanca' AND llantas = '$llantas' AND guar_fangos = '$guar_fangos' AND lim_parabrisas = '$limp_parabrisas' ");
	if(mysqli_num_rows($cosulPartes)==1){
		//en caso de que exista
		$row = mysqli_fetch_array($cosulPartes);
		$idPartes = $row['idpartes'];
	}
	else{
		$regPartes = "INSERT INTO partes(vidrios ,retrovisores ,radio ,placa_control ,faroles ,guiñadores ,volante ,palanca ,llantas ,guar_fangos ,lim_parabrisas ) VALUES ('$vidrio', '$retrovisor','$radio','$placac','$faroles','$guiñadores','$volante','$palanca','$llantas','$guar_fangos','$limp_parabrisas')";
		$resul= @mysqli_query($conex,$regPartes);
		if (!$resul) {
			die("Fallo al ingresar partes");
		}
		$consulPartes=mysqli_query($conex,"SELECT * FROM partes WHERE vidrios = '$vidrio' AND retrovisores = '$retrovisor' AND radio = '$radio' AND placa_control = '$placac' AND faroles = '$faroles' AND guiñadores = '$guiñadores' AND volante = '$volante' AND palanca = '$palanca' AND llantas = '$llantas' AND guar_fangos = '$guar_fangos' AND lim_parabrisas = '$limp_parabrisas' ");
		if(mysqli_num_rows($consulPartes)==1){
			$row = mysqli_fetch_array($consulPartes);
			$idPartes = $row['idpartes'];
		}
	}
	$regInvent = "INSERT INTO inventario(idregistro_vehiculo ,idpartes ,lugar ,unidad ,fecha ,hora ,ciudad ,motivo ,sis_mecanico ,estruc_metalica ,pin_externa ,observaciones ,funcionario ,responsable ) VALUES ('$idV','$idPartes','$lugar','$unidad','$fecha','$hora','$ciudad','$motivo','$s_mecanico','$estruc','$pint_ext','$obser' ,'$funcionario' ,'$responsable')";
	$invent= @mysqli_query($conex,$regInvent);
	if (!$invent) {
		die("Fallo al ingresar Inventario");
	}
	$consul=mysqli_query($conex,"SELECT * FROM inventario WHERE idregistro_vehiculo= '$idV'  AND idpartes= '$idPartes'  AND fecha = '$fecha' AND hora ='$hora' ");
	if(mysqli_num_rows($consul)==1){
		$row = mysqli_fetch_array($consul);
		$idInvent = $row['idinventario'];		
	}
	$regDiag = "INSERT INTO diagnostico(idinventario ,motor ,sis_alimentacion ,sis_refrigeracion ,sis_distribucion ,sis_lubricacion ,sis_transmision ,sis_freno ,sis_direccion ,sis_suspencion ,tren_rotura ,encendido ,arranque ,iluminacion,observaciones ,funcionario ) VALUES ('$idInvent', '$motor','$sis_alimentacion','$sis_refri','$sis_distribucion','$sis_lubri','$sis_trans','$sis_freno','$sis_direc','$sis_susp','$tren_rota','$encendido' ,'$arranque' ,'$iluminacion','$observaciones','$funcionario')";
	$diagnos= @mysqli_query($conex,$regDiag );
	if (!$diagnos) {
		die("Fallo al ingresar diagnostico");
	}
	$consuldig = mysqli_query($conex,"SELECT * FROM diagnostico WHERE idinventario = '$idInvent'  ");
	if(mysqli_num_rows($consuldig)==1){
		$row = mysqli_fetch_array($consuldig);
		$idD = $row['iddiagnostico'];
	}
	header("Location: verif_estado.php?idD=$idD");
	?>

	<?php
}
 ?>