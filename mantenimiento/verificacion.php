<?php 
	require_once "vistas/parte_superior.php";
	include("../conexion/con_db.php");
	if (isset($_GET['mant'])) {
		$idMant = $_GET['mant'];
		$query = "SELECT * FROM mant_preventivo WHERE idmant_preventivo = $idMant";
		$resultado = mysqli_query($conex,$query);
		if(mysqli_num_rows($resultado)==1){
			$row = mysqli_fetch_array($resultado);
			$idRegV = $row['idregistro_vehiculo'];
			$idDatG = $row['iddatos_generales'];
			$a_motor = $row['ca_motor'];
			$a_caja = $row['ca_caja'];
			$a_transmision = $row['ca_transmision'];
			$engrase = $row['engrase'];
			$limpieza = $row['limpieza'];
			$funcionario = $row['funcionario'];
			$responsable = $row['responsable'];

			$consul= "SELECT * FROM datos_generales WHERE iddatos_generales = $idDatG";
			$orden=mysqli_query($conex,$consul);
			if(mysqli_num_rows($orden)==1){
				$row = mysqli_fetch_array($orden);
				$lugar = $row['lugar'];
			    $fecha = $row['fecha'];
			    $hora = $row['hora'];
			    $unidad = $row['unidad'];
			    $ciudad = $row['ciudad'];
			}		    
		}
			
		 ?> 
		
		<div class=" container" id='form'>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong></strong> Registro realizado satisfactoriamente
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			
			<form  action="pdf_preventivo.php" method="POST" target=_blank>
				<input type="hidden" id="inputNro" name="idMant" value="<?php echo $idMant; ?>">				 
				 <p align="right">
				 	<input type="submit" class="btn btn-secondary" name="entrale" value="+Generar Archivo PDF ">
				 	<button type="button" class="btn btn-danger" onclick="location.href='lista.php'">Terminar Proceso</button>
				 </p>			 
			</form>

		 	<fieldset disabled>
		 		<h1 class="titulo">MANTENIMIENTO PREVENTIVO</h1>
		 		<h4 class="subtitulo">I. Datos Generales:</h4>	
		 		
		 		<div class="form-row">
				    <div class="form-group col-md-6">
				      <label >Lugar</label>
				      <input type="text" class="form-control" value="<?php echo $lugar; ?> " required>    
				    </div>
				    <div class="form-group col-md-3">
				      <label >Fecha</label>
				      <input type="text" class="form-control" value="<?php echo $fecha; ?>" required>
				    </div>
				    <div class="form-group col-md-3">
				      <label >Hora</label>
				      <input type="text" class="form-control" value="<?php echo $hora; ?>" required>
				    </div>
			    </div>
			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label >Unidad</label>
				      <input type="text" class="form-control" value="<?php echo $unidad; ?> " required>
				    </div>
				    <div class="form-group col-md-3">
				      <label for="inputCiudad">Ciudad</label>
				      <input type="text" class="form-control" value="<?php echo $ciudad; ?>" required>
				    </div>
			    </div>
			    <h4 class="subtitulo">II. Datos participantes:</h4>
			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputFuncionario">Funcionario CEMAPOL</label>
				      <input type="text"  class="form-control" value="<?php echo $funcionario; ?>" required >
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputResponsable">Responsable del vehiculo</label>
				      <input type="text" class="form-control" value="<?php echo $responsable; ?>" required>
				    </div>
			    </div>
			    <h4 class="subtitulo">III. Mantenimiento realizado:</h4>
			    <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputCam">Cambio de Aceite de Motor</label>
				      <input type="text"  class="form-control" value="<?php echo $a_motor; ?>" required >
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputCac">Cambio de Aceite de Caja</label>
				      <input type="text" class="form-control" value="<?php echo $a_caja; ?>" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputCat">Cambio de Aceite de Transmision</label>
				      <input type="text" class="form-control" value="<?php echo $a_transmision; ?>" required>
				    </div>
			    </div>
			    <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputEngrase">Engrase</label>
				      <input type="text"  class="form-control" value="<?php echo $engrase; ?>" required >
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputLimpieza">Limpieza</label>
				      <input type="text" class="form-control" value="<?php echo $limpieza; ?>" required>
				    </div>
			    </div>
			    <br>
		 	</fieldset> 
		 	
		</div>  
		<?php			
	}

	require_once "vistas/parte_inferior.php";
?>