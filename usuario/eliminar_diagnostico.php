<?php 
	include("../conexion/con_db.php");

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$cont = "SELECT * FROM diagnostico WHERE iddiagnostico = $id";
		$resul= mysqli_query($conex,$cont);
		if(mysqli_num_rows($resul)==1){
			$row = mysqli_fetch_array($resultado);
			$idI = $row['idinventario'];
			echo $idI;
		}
		$consul = "DELETE FROM inventario WHERE idinventario = $idI";
		$res = mysqli_query($conex,$consul);

		$query = "DELETE FROM diagnostico WHERE iddiagnostico = $id";
		$resultado = mysqli_query($conex,$query);		

		$consul = "DELETE FROM inventario WHERE idinventario = $idI";
		$res = mysqli_query($conex,$consul);

		$query = "DELETE FROM diagnostico WHERE iddiagnostico = $id";
		$resultado = mysqli_query($conex,$query);	
		

		/*$query = "DELETE FROM diagnostico WHERE iddiagnostico = $id";
		$resultado = mysqli_query($conex,$query);

		$consul = "DELETE FROM diagnostico WHERE idinventario = $id";
		$res = mysqli_query($conex,$consul);*/
		$_SESSION['message']='Registro de Diagnostico eliminado Satisfactoriamente';
		$_SESSION['message_type']='danger';
		//header("Location: his_administrador.php");
	} 
 ?>