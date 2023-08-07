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
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong></strong> Registro realizado satisfactoriamente
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
	</div>
	
<div class="form-row">
	<div class="form-group col-md-6">
	</div>
	<div class="form-group col-md-2">
		<form method="POST" action="pdf_inventario.php" target=_blank>
			<input type="hidden" id="inputIdv" name="idD" value="<?php echo $idD; ?>">
			<p align="right">
				<input type="submit" class="btn btn-success" name="enviar" value="PDF Inventario">
 			</p>
			
		</form>
	</div>
	<div class="form-group col-md-2">
		<form method="POST" action="pdf_diagnostico.php" target=_blank>
			<input type="hidden" id="inputIdv" name="idD" value="<?php echo $idD; ?>">
			<p align="right">
				<input type="submit" class="btn btn-secondary" name="enviar" value="PDF Diagnostico"> 
 			</p>			
		</form>
	</div>
	<div class="form-group col-md-2">
		<form method="POST" action="lista_estado.php" >
			<p align="right">
				<input type="submit" class="btn btn-danger" name="enviar" value="Terminar Proceso"> 
 			</p>
			
		</form>
	</div>
</div>
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
	<h2 class="titulo">FORMULARIO TECNICO DE DIAGNOSTICO DEL VEHICULO</h2>
	<h5 class="subtitulo">I. Motor y Sistemas de Motor:</h5>
	<div class="form-row">
		<div class="form-group col-md-2">
	      <label for="inputLugar">Motor</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_motor; ?>"  required >
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputLugar">Sistema de Alimentacion</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_alimentacion; ?>"  required >
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Sistema de Refrigeracion</label>
	      <input type="text" class="form-control" value="<?php echo $sis_refrigeracion; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
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
	    <div class="form-group col-md-2">
	      <label for="inputLugar">Sistema de Freno</label>
	      <input type="text"  class="form-control" value="<?php echo $sis_freno; ?>"  required >
	    </div>
	    <div class="form-group col-md-2">
	      <label for="inputUnidad">Sistema de Direccion</label>
	      <input type="text" class="form-control" value="<?php echo $sis_direccion; ?>" required>
	    </div>
	    <div class="form-group col-md-2">
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
</div>


<?php
require_once "vistas/parte_inferior.php" ;
 ?>