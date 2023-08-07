<?php 
include("../conexion/con_db.php");
require_once "vistas/parte_superior.php";
if (isset($_GET['idI'])) {
	$idI = $_GET['idI'];
	$cons = "SELECT * FROM inventario WHERE idinventario = '$idI'" ;
	$resu = mysqli_query($conex,$cons);
	if(mysqli_num_rows($resu)==1){
	 	$row = mysqli_fetch_array($resu);
	 	$idRegV = $row['idregistro_vehiculo'];
	 	$idPart = $row['idpartes'];
	 	$lugar = $row['lugar'];
		$fecha = $row['fecha'];
	    $hora = $row['hora'];
		$unidad = $row['unidad'];
		$ciudad = $row['ciudad'];
		$motivo = $row['motivo'];
		$sis_mecanico = $row['sis_mecanico'];
		$estructura =$row['estruc_metalica'];
		$pintura =$row['pin_externa'];
		$obser =$row['observaciones'];
		$funcionario = $row['funcionario'];
		$responsable = $row['responsable'];
	 }
	 $consulta = "SELECT * FROM partes WHERE idpartes = '$idPart'";
	 $prob=mysqli_query($conex,$consulta);
	 if (mysqli_num_rows($prob)==1) {
	 	$row = mysqli_fetch_array($prob);
	 	$vidrios = $row['vidrios'];
	 	$retrovisores = $row['retrovisores'];
	 	$radio = $row['radio'];
	 	$placa_control = $row['placa_control'];
	 	$faroles = $row['faroles'];
	 	$guiñadores = $row['guiñadores'];
	 	$volante = $row['volante'];
	 	$palanca = $row['palanca'];
	 	$llantas = $row['llantas'];
	 	$guar_fangos = $row['guar_fangos'];
	 	$lim_parabrisas = $row['lim_parabrisas'];
	 }
}
?>
<div class=" container" id='form'>
<fieldset disabled>
	<h2 class="titulo">FORMULARIO TECNICO DE INVENTARIO DEL VEHICULO</h2>
	<h5 class="subtitulo">I. Datos Generales del Inventario:</h5>
		  <!-- Fila 1-->
	<div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputLugar">Lugar</label>
	      <input type="text"  class="form-control" value="<?php echo $lugar; ?>"  required >
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputUnidad">Unidad</label>
	      <input type="text" class="form-control" value="<?php echo $unidad; ?>" required>
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputUnidad">Fecha</label>
	      <input type="text" class="form-control" value="<?php echo $fecha; ?>" required>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputLugar">Hora</label>
	      <input type="text"  class="form-control" value="<?php echo $hora; ?>"  required >
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputUnidad">Ciudad</label>
	      <input type="text" class="form-control" value="<?php echo $ciudad; ?>" required>
	    </div>
	</div>
	<h5 class="subtitulo">II. ESTADO ACTUAL DEL VEHICULO:</h5>
		  <!-- Fila 1-->
	<div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputLugar">Sistemas Mecanicos</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_mecanico; ?>"  required >
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputUnidad">Estructura Metalica</label>
	      <input type="text" class="form-control" value="<?php echo $estructura; ?>" required>
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputUnidad">Pintura externa</label>
	      <input type="text" class="form-control" value="<?php echo $pintura; ?>" required>
	    </div>
	</div>
	<h5 class="subtitulo">III. INVENTARIO DE PARTES:</h5>
		  <!-- Fila 1-->
	<div class="form-row">
	    <div class="form-group col-md-2">
	      <label for="inputLugar">Vidrios</label>
	      <input type="text"  class="form-control" value="<?php echo $vidrios; ?>"  required >
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Retrovisores</label>
	      <input type="text" class="form-control" value="<?php echo $retrovisores; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Radio</label>
	      <input type="text" class="form-control" value="<?php echo $radio; ?>" required>
	    </div>
	     <div class="form-group col-md-2">
	      <label for="inputUnidad">Placa de control</label>
	      <input type="text" class="form-control" value="<?php echo $placa_control; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Faroles</label>
	      <input type="text" class="form-control" value="<?php echo $faroles; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Guiñadores</label>
	      <input type="text" class="form-control" value="<?php echo $guiñadores; ?>" required>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-2">
	      <label for="inputLugar">Volante</label>
	      <input type="text"  class="form-control" value="<?php echo $volante; ?>"  required >
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Palanca</label>
	      <input type="text" class="form-control" value="<?php echo $palanca; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Llantas</label>
	      <input type="text" class="form-control" value="<?php echo $llantas; ?>" required>
	    </div>
	     <div class="form-group col-md-2">
	      <label for="inputUnidad">Guarda Fangos</label>
	      <input type="text" class="form-control" value="<?php echo $guar_fangos; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Limpia Parabrisas</label>
	      <input type="text" class="form-control" value="<?php echo $lim_parabrisas; ?>" required>
	    </div>
	</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
		    <label for="Detalle">Observaciones Generales</label>
		    <textarea type="text" class="form-control" rows="3" value=""  required><?php echo $obser; ?></textarea>
		</div>	    
	</div>
</fieldset>	
<a href="javascript: history.go(-1)" class="btn btn-danger">Volver</a>
</div>
<?php
require_once "vistas/parte_inferior.php" ;
 ?>