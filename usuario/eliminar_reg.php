<?php 
	include("../conexion/con_db.php");

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$query = "DELETE FROM registro_vehiculo WHERE idregistro_vehiculo = $id";
		$resultado = mysqli_query($conex,$query);
		if(!resultado){
			die("Fallo");
		}

		$_SESSION['message']='Registro eliminado Satisfactoriamente';
		$_SESSION['message_type']='danger';
		header("Location: admi_registros.php");
	} 
 ?>