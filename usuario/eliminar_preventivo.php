<?php 
	include("../conexion/con_db.php");

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$query = "DELETE FROM mant_preventivo WHERE idmant_preventivo = $id";
		$resultado = mysqli_query($conex,$query);
		if(!resultado){
			die("Fallo");
		}

		$_SESSION['message']='Registro de Mantenimiento Preventivo eliminado Satisfactoriamente';
		$_SESSION['message_type']='danger';
		header("Location: his_administrador.php");
	} 
 ?>