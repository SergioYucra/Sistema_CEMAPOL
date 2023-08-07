<?php 
require_once "vistas/parte_superior.php";
include("../conexion/con_db.php");
if (isset($_GET['mant'])) {
	$idMant = $_GET['mant'];
	$query = "SELECT * FROM mant_correctivo WHERE idmant_correctivo = $idMant";
	$resultado = mysqli_query($conex,$query);
	if(mysqli_num_rows($resultado)==1){
		$row = mysqli_fetch_array($resultado);
		$idRegV = $row['idregistro_vehiculo'];
		$idDatG = $row['iddatos_generales'];
		$sis_motor = $row['sis_motor'];
		$sis_mecanico = $row['sis_mecanico'];
		$sis_electrico = $row['sis_electrico'];
		$estructura = $row['estructura'];
		$funcionario = $row['funcionario'];
		$responsable = $row['responsable'];
		$detalle = $row['detalle'];
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
		<fieldset disabled>
			 		<h1 class="titulo">MANTENIMIENTO CORRECTIVO</h1>
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
				    <h4 class="subtitulo">III. Trabajos realizados de Mantenimiento Correctivo:</h4>
				    <div class="form-row">
						<div class="form-group col-md-12">
					      <label for="inputCam">Sistema del motor</label>
					      <input type="text"  class="form-control" value="<?php echo $sis_motor; ?>" required >
					    </div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
					      <label for="inputCac">Sistemas Mecanicos</label>
					      <input type="text" class="form-control" value="<?php echo $sis_mecanico; ?>" required>
					    </div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
					      <label for="inputCat">Sistema Electrico</label>
					      <input type="text" class="form-control" value="<?php echo $sis_electrico; ?>" required>
					    </div>
					</div>	
					<div class="form-row">
						<div class="form-group col-md-12">
					      <label for="inputCat">Estructura de Carroceria y chasis(Bastidor)</label>
					      <input type="text" class="form-control" value="<?php echo $estructura; ?>" required>
					    </div>
					</div>
					<div class="form-group col-md-12">
					    <label for="Detalle">Detalle del trabajo</label>
					    <textarea type="text" class="form-control" rows="3" value=""  required><?php echo $detalle; ?></textarea>
					</div>				    
				    <br>
		</fieldset> 
		<a href="javascript: history.go(-1)" class="btn btn-danger">Volver</a>
		</div>
	<?php
}

require_once "vistas/parte_inferior.php";
?>