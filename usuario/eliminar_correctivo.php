<?php 
	include("../conexion/con_db.php");

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$query = "DELETE FROM mant_correctivo WHERE idmant_correctivo = $id";
		$resultado = mysqli_query($conex,$query);
		if(!resultado){
			die("Fallo");
		}

		$_SESSION['message']='Registro de Mantenimiento Correctivo eliminado Satisfactoriamente';
		$_SESSION['message_type']='danger';
		header("Location: his_administrador.php");
	} 
 ?>