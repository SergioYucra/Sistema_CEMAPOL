<?php 
	include("../conexion/con_db.php");

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$query = "DELETE FROM inventario WHERE idinventario = $id";
		$resultado = mysqli_query($conex,$query);

		$consul = "DELETE FROM diagnostico WHERE idinventario = $id";
		$res = mysqli_query($conex,$consul);

		$query = "DELETE FROM inventario WHERE idinventario = $id";
		$resultado = mysqli_query($conex,$query);

		$consul = "DELETE FROM diagnostico WHERE idinventario = $id";
		$res = mysqli_query($conex,$consul);
		$_SESSION['message']='Registro de Inventario eliminado Satisfactoriamente';
		$_SESSION['message_type']='danger';
		header("Location: his_administrador.php");
	} 
 ?>