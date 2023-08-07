<?php  require_once "vistas/parte_superior.php" ?>
<?php 
	$alert= '';
	if (!empty($_POST)) {
		if (empty($_POST['usuario']) || empty($_POST['clave'])) 
		{//Pregunta si se lleno los campos
			?>
			  <div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Error!</strong> Llene todos los datos.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
			  </div>
			
			<?php
		}else{
			require_once "../conexion/con_db.php";
			$user = $_POST['usuario'];
			$pass = $_POST['clave'];
			$id = 0 ;
			$query = mysqli_query($conex,"SELECT * FROM usuario WHERE usuario = '$user' AND password = '$pass' ");
			$result = mysqli_num_rows($query);
			if($result > 0)
			{//En caso de que esxita un registro de cdatos en la base de datos
				//sacar el id del usuario que esta entrando
				if(mysqli_num_rows($query)==1){
					$row = mysqli_fetch_array($query);
					$id = $row['idusuario'];
				    $_SESSION['mensaje']=$id;
				    echo "<script>location.href='admi_registros.php'</script>";
				}
				
				//echo "<script>location.href='admi_registros.php'</script>";
			}
			else{//Si no existen esos datos en la base de datos
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Error!</strong> Datos ingresados incorrectos.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
			  </div>
				<?php
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
<style type="text/css">
	#login{
		
		width: 40em;
	}
</style>
</head>
<body>
	<!--Formulario de logeo -->
<div class=" container" id='login'>
	<div class="card card-login mx-auto text-center bg-dark">
		<div class="card-header mx-auto bg-dark">
			<span> 
				<img src="../img/logo.png" height="120" width="120" alt="Logo"> 
			</span><br/>
            <span class="logo_title mt-5"> Iniciar Sesión </span>
        </div>
        <div class="card-body">
			<form action="" method="post">
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="usuario" placeholder="usuario"><br>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="clave" placeholder="contraseña">
                </div>
                <div class="form-group">
                   	<button type="submit" value="Ingresar" class="btn btn-success" name="register">Ingresar</button>
                </div>
			</form>
		</div>		
	</div>
</div>
</body>
</html>

<?php  require_once "vistas/parte_inferior.php" ?>
