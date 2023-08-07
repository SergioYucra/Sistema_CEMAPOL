<?php 
require_once "vistas/parte_superior.php";
include("../conexion/con_db.php");
date_default_timezone_set("America/La_Paz");
if (isset($_POST['inven'])) {
	$idV=trim($_POST['idV']);
	$lugar= trim($_POST['lugar']);
	$fecha = date("d/m/y");
	$hora = date("H:i A");
	$unidad = trim($_POST['unidad']);
	$ciudad = trim($_POST['ciudad']);
	$motivo = trim($_POST['motivo']);
	$responsable = trim($_POST['responsable']);
	$funcionario = trim($_POST['funcionario']);
	$s_mecanico= trim($_POST['s_mecanicos']);
	$estruc = trim($_POST['estructura']);
	$pint_ext=trim($_POST['pintura']);
	$obser=trim($_POST['obser']);

	$vidrio=trim($_POST['vidrio']);
	$retrovisor=trim($_POST['retrovisor']);
	$radio=trim($_POST['radio']);
	$placac=trim($_POST['placac']);
	$faroles=trim($_POST['faroles']);
	$guiñadores=trim($_POST['guiñadores']);
	$volante=trim($_POST['volante']);
	$palanca=trim($_POST['palanca']);
	$llantas=trim($_POST['llantas']);
	$guar_fangos=trim($_POST['guar_fangos']);
	$limp_parabrisas=trim($_POST['limp_parabrisas']);
	?>
	<div class=" container" id='form'>
		<h2 class="titulo">FORMULARIO TECNICO DE DIAGNOSTICO DEL VEHICULO</h2>
		<!-- Formulario -->
		<form method="POST" action="guardar_reporte.php" >
			<input type="hidden" id="inputIdv" name="idV" value="<?php echo $idV; ?>">
			<input type="hidden" id="inputLugar" name="lugar" value="<?php echo $lugar; ?>">
			<input type="hidden" id="inputFecha" name="fecha" value="<?php echo $fecha; ?>">
			<input type="hidden" id="inputHora" name="hora" value="<?php echo $hora; ?>">
			<input type="hidden" id="inputUnidad" name="unidad" value="<?php echo $unidad; ?>">
			<input type="hidden" id="inputCiudad" name="ciudad" value="<?php echo $ciudad; ?>">
			<input type="hidden" id="inputMotivo" name="motivo" value="<?php echo $motivo; ?>">
			<input type="hidden" id="inputResponsable" name="responsable" value="<?php echo $responsable; ?>">
			<input type="hidden" id="inputFuncionario" name="funcionario" value="<?php echo $funcionario; ?>">
			<input type="hidden" id="inputSmecanico" name="s_mecanico" value="<?php echo $s_mecanico; ?>">
			<input type="hidden" id="inputEstruc" name="estruc" value="<?php echo $estruc; ?>">
			<input type="hidden" id="inputPintura" name="pintura" value="<?php echo $pint_ext; ?>">
			<input type="hidden" id="inputObser" name="obser" value="<?php echo $obser; ?>">
			<input type="hidden" id="inputVidrio" name="vidrio" value="<?php echo $vidrio; ?>">
			<input type="hidden" id="inputRetro" name="retrovisor" value="<?php echo $retrovisor; ?>">
			<input type="hidden" id="inputRadio" name="radio" value="<?php echo $radio; ?>">
			<input type="hidden" id="inputPlaca" name="placac" value="<?php echo $placac; ?>">
			<input type="hidden" id="inputFaroles" name="faroles" value="<?php echo $faroles; ?>">
			<input type="hidden" id="inputGuiñadores" name="guiñadores" value="<?php echo $guiñadores; ?>">
			<input type="hidden" id="inputVolante" name="volante" value="<?php echo $volante; ?>">
			<input type="hidden" id="inputPalanca" name="palanca" value="<?php echo $palanca; ?>">
			<input type="hidden" id="inputLlantas" name="llantas" value="<?php echo $llantas; ?>">
			<input type="hidden" id="inputGuar" name="guar_fangos" value="<?php echo $guar_fangos; ?>">
			<input type="hidden" id="inputLimp" name="limp_parabrisas" value="<?php echo $limp_parabrisas; ?>">
			 <!-- Iniciando DATOS DE IDENTIFICACION-->
			  <h4 class="subtitulo">I. Motor y Sistemas del motor:</h4>
			    <div class="form-row">
			  	<!-- Fila 1 -->
				  	<div class="form-group col-md-6">
				  		<h6>Motor</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="motor" id="inputMotor1" value="BUENO" required>
						  <label class="form-check-label" for="inputMotor1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="motor" id="inputMotor2" value="REGULAR" >
						  <label class="form-check-label" for="inputMotor2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="motor" id="inputMotor3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputMotor3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="motor" id="inputMotor4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputMotor4" >FUERA DE USO</label>
						</div>
			    	</div>
			    	<div class="form-group col-md-6">
				  		<h6>Sistema de Alimentacion</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_alimentacion" id="inputSaliment1" value="BUENO" required>
						  <label class="form-check-label" for="inputSaliment1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_alimentacion" id="inputSaliment2" value="REGULAR" >
						  <label class="form-check-label" for="inputSaliment2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_alimentacion" id="inputSaliment3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputSaliment3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_alimentacion" id="inputSaliment4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputSaliment4" >FUERA DE USO</label>
						</div>
			    	</div>
			    </div>
			    <!-- Fila 2 -->
			    <div class="form-row">
			    	<div class="form-group col-md-6">
				  		<h6>Sistema de Refrigeracion</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_refri" id="inputSrefri1" value="BUENO" required>
						  <label class="form-check-label" for="inputSrefri1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_refri" id="inputSrefri2" value="REGULAR" >
						  <label class="form-check-label" for="inputSrefri2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_refri" id="inputSrefri3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputSrefri3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_refri" id="inputSrefri4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputSrefri4" >FUERA DE USO</label>
						</div>
			    	</div>
			    	<div class="form-group col-md-6">
				  		<h6>Sistema de Distribucion</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_distribucion" id="inputSdistri1" value="BUENO" required>
						  <label class="form-check-label" for="inputSdistri1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_distribucion" id="inputSdistri2" value="REGULAR" >
						  <label class="form-check-label" for="inputSdistri2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_distribucion" id="inputSdistri3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputSdistri3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_distribucion" id="inputSdistri4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputSdistri4" >FUERA DE USO</label>
						</div>
			    	</div>
			    </div>
			    <!-- Fila 3 -->
			    <div class="form-row">
			    	<div class="form-group col-md-6">
				  		<h6>Sistema de Lubricacion</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_lubri" id="inputSlubri1" value="BUENO" required>
						  <label class="form-check-label" for="inputSlubri1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_lubri" id="inputSlubri2" value="REGULAR" >
						  <label class="form-check-label" for="inputSlubri2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_lubri" id="inputSlubri3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputSlubri3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_lubri" id="inputSlubri4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputSlubri4" >FUERA DE USO</label>
						</div>
			    	</div>			    	
			    </div>

			    <h4 class="subtitulo">II. Sistemas Mecanicos:</h4>
			    <div class="form-row">
			  	<!-- Fila 1 -->
				  	<div class="form-group col-md-6">
				  		<h6>Sistema de Transmision de Potencia</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_trans" id="inputStrans1" value="BUENO" required>
						  <label class="form-check-label" for="inputStrans1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_trans" id="inputStrans2" value="REGULAR" >
						  <label class="form-check-label" for="inputStrans2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_trans" id="inputStrans3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputStrans3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_trans" id="inputStrans4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputStrans4" >FUERA DE USO</label>
						</div>
			    	</div>
			    	<div class="form-group col-md-6">
				  		<h6>Sistema de Freno</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_freno" id="inputSfreno1" value="BUENO" required>
						  <label class="form-check-label" for="inputSfreno1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_freno" id="inputSfreno2" value="REGULAR" >
						  <label class="form-check-label" for="inputSfreno2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_freno" id="inputSfreno3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputSfreno3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_freno" id="inputSfreno4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputSfreno4" >FUERA DE USO</label>
						</div>
			    	</div>
			    </div>

			    <div class="form-row">
			  	<!-- Fila 1 -->
				  	<div class="form-group col-md-6">
				  		<h6>Sistema de direccion</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_direc" id="inputSdirec1" value="BUENO" required>
						  <label class="form-check-label" for="inputSdirec1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_direc" id="inputSdirec2" value="REGULAR" >
						  <label class="form-check-label" for="inputSdirec2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_direc" id="inputSdirec3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputSdirec3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_direc" id="inputSdirec4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputSdirec4" >FUERA DE USO</label>
						</div>
			    	</div>
			    	<div class="form-group col-md-6">
				  		<h6>Sistema de Suspension</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_susp" id="inputSsus1" value="BUENO" required>
						  <label class="form-check-label" for="inputSsus1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_susp" id="inputSsus2" value="REGULAR" >
						  <label class="form-check-label" for="inputSsus2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_susp" id="inputSsus3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputSsus3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sis_susp" id="inputSsus4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputSsus4" >FUERA DE USO</label>
						</div>
			    	</div>
			    </div>
			    <div class="form-row">
			  	<!-- Fila 1 -->
				  	<div class="form-group col-md-6">
				  		<h6>Tren de Rotadura</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tren_rota" id="inputTren1" value="BUENO" required>
						  <label class="form-check-label" for="inputTren1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tren_rota" id="inputTren2" value="REGULAR" >
						  <label class="form-check-label" for="inputTren2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tren_rota" id="inputTren3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputTren3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tren_rota" id="inputTren4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputTren4" >FUERA DE USO</label>
						</div>
			    	</div>
			    </div>
			    <h4 class="subtitulo">III. Sistemas Electrico:</h4>
			    <div class="form-row">
			  	<!-- Fila 1 -->
				  	<div class="form-group col-md-6">
				  		<h6>Encendido</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="encendido" id="inputEncendido1" value="BUENO" required>
						  <label class="form-check-label" for="inputEncendido1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="encendido" id="inputEncendido2" value="REGULAR" >
						  <label class="form-check-label" for="inputEncendido2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="encendido" id="inputEncendido3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputEncendido3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="encendido" id="inputEncendido4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputEncendido4" >FUERA DE USO</label>
						</div>
			    	</div>
			    	<div class="form-group col-md-6">
				  		<h6>Arranque</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="arranque" id="inputArranque1" value="BUENO" required>
						  <label class="form-check-label" for="inputArranque1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="arranque" id="inputArranque2" value="REGULAR" >
						  <label class="form-check-label" for="inputArranque2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="arranque" id="inputArranque3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputArranque3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="arranque" id="inputArranque4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputArranque4" >FUERA DE USO</label>
						</div>
			    	</div>
			    </div>
			    <div class="form-row">
			  	<!-- Fila 1 -->
				  	<div class="form-group col-md-6">
				  		<h6>Iluminacion</h6>
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="iluminacion" id="inputIluminacion1" value="BUENO" required>
						  <label class="form-check-label" for="inputIluminacion1" >BUENO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="iluminacion" id="inputIluminacion2" value="REGULAR" >
						  <label class="form-check-label" for="inputIluminacion2" >REGULAR</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="iluminacion" id="inputIluminacion3" value="DETERIORADO" >
						  <label class="form-check-label" for="inputIluminacion3" >DETERIORADO</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="iluminacion" id="inputIluminacion4" value="FUERA DE USO" >
						  <label class="form-check-label" for="inputIluminacion4" >FUERA DE USO</label>
						</div>
			    	</div>			    	
			    </div>
			    <div class="form-group col-md-12">
				    <label for="Observaciones">Observaciones Generales</label>
				    <textarea type="text" class="form-control" id="Observaciones" rows="3" name="observaciones" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z0-9 -?]+$"  title="Ingrese algun tipo de observacion"></textarea>
				</div>
				<a href="javascript: history.go(-1)" class="btn btn-success">Anterior</a>
				<input type="submit" class="btn btn-success" name="enviar" value="Registrar"> 		  
		  		<button type="button" class="btn btn-danger" onclick="location.href='lista_estado.php'">Cancelar</button>
		</form>
	</div>
  <?php
}
require_once "vistas/parte_inferior.php"; ?>