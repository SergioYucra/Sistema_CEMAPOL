<?php 
include("../conexion/con_db.php");
require_once "vistas/parte_superior.php";
if (isset($_GET['idD'])) {
	$idD = $_GET['idD'];
	$consul = "SELECT * FROM diagnostico WHERE iddiagnostico = '$idD'";
	$res = mysqli_query($conex,$consul);
	 if(mysqli_num_rows($res)==1){
	 	$row = mysqli_fetch_array($res);
	 	$idI = $row['idinventario'];
	 	$sis_motor = $row['motor'];
	 	$sis_alimentacion = $row['sis_alimentacion'];
	 	$sis_refrigeracion = $row['sis_refrigeracion'];
	 	$sis_distribucion = $row['sis_distribucion'];
	 	$sis_lubricacion = $row['sis_lubricacion'];
	 	$sis_transmision = $row['sis_transmision'];
	 	$sis_freno = $row['sis_freno'];
	 	$sis_direccion = $row['sis_direccion'];
	 	$sis_suspencion = $row['sis_suspencion'];
	 	$tren_rotura = $row['tren_rotura'];
	 	$encendido = $row['encendido'];
	 	$arranque = $row['arranque'];
	 	$iluminacion = $row['iluminacion'];
	 	$observa = $row['observaciones'];
	 }
}
?>
<div class=" container" id='form'>
<fieldset disabled>	
	<h2 class="titulo">FORMULARIO TECNICO DE DIAGNOSTICO DEL VEHICULO</h2>
	<h5 class="subtitulo">I. Motor y Sistemas de Motor:</h5>
	<div class="form-row">
		<div class="form-group col-md-2">
	      <label for="inputLugar">Motor</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_motor; ?>"  required >
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputLugar">Sistema de Alimentacion</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_alimentacion; ?>"  required >
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Sistema de Refrigeracion</label>
	      <input type="text" class="form-control" value="<?php echo $sis_refrigeracion; ?>" required>
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputUnidad">Sistema de Distribucion</label>
	      <input type="text" class="form-control" value="<?php echo $sis_distribucion; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Sistema de Lubricacion</label>
	      <input type="text" class="form-control" value="<?php echo $sis_lubricacion; ?>" required>
	    </div>
	</div>
	<h5 class="subtitulo">II.Sistemas Mecanicos:</h5>
	<div class="form-row">
		<div class="form-group col-md-2">
	      <label for="inputLugar">Sistema de Transmision</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_transmision; ?>"  required >
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputLugar">Sistema de Freno</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_freno; ?>"  required >
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Sistema de Direccion</label>
	      <input type="text" class="form-control" value="<?php echo $sis_direccion; ?>" required>
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputUnidad">Sistema de Suspension</label>
	      <input type="text" class="form-control" value="<?php echo $sis_suspencion; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Tren de Rotadura</label>
	      <input type="text" class="form-control" value="<?php echo $tren_rotura; ?>" required>
	    </div>
	</div>
	<h5 class="subtitulo">II.Sistemas Electrico:</h5>
	<div class="form-row">
		<div class="form-group col-md-4">
	      <label for="inputLugar">Encendido</label>
	      <input type="text"  class="form-control" value="<?php echo $encendido; ?>"  required >
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputLugar">Arranque</label>
	      <input type="text"  class="form-control" value="<?php echo $arranque; ?>"  required >
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputUnidad">Iluminacion</label>
	      <input type="text" class="form-control" value="<?php echo $iluminacion; ?>" required>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
		    <label for="Detalle">Observaciones Generales</label>
		    <textarea type="text" class="form-control" rows="3" value=""  required><?php echo $observa; ?></textarea>
		</div>	    
	</div>
</fieldset>	
<a href="javascript: history.go(-1)" class="btn btn-danger">Volver</a>
</div>
<?php
require_once "vistas/parte_inferior.php" ;
 ?>