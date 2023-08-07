<?php  require_once "vistas/parte_superior.php" ;
	if (isset($_GET['id'])) {
		$idV = $_GET['id'];
	}
?>
<div class=" container" id='form'>
	<h2 class="titulo">FORMULARIO TECNICO DE INVENTARIO DEL VEHICULO</h2>

	<!-- Formulario -->
	<form method="POST" action="form_diagnostico.php" >
		 <!-- Iniciando DATOS DE IDENTIFICACION-->
		  <h4 class="subtitulo">I. Datos Generales del Inventario:</h4>
		  <!-- Fila 1-->
		  <input type="hidden" id="inputNro" name="idV" value="<?php echo $idV; ?>">
		  <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="inputLugar">Lugar</label>
		      <input type="text"  class="form-control" id="inputLugar" name="lugar" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="[A-Z]*" title="Error! Ejemplo: CEMAPOL" required >
		    </div>
		    <div class="form-group col-md-5">
		      <label for="inputUnidad">Unidad</label>
		      <input type="text" class="form-control" id="inputUnidad" name="unidad" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z\s]+$" title="Error! Ejemplo: EPI SUR" required>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputCiudad">Ciudad</label>
			      <select class="form-control " id="inputCiudad" name="ciudad" required>
			        <option value="LA PAZ">LA PAZ</option>
			        <option value="ORURO">ORURO</option>
			        <option value="COCHABAMBA">COCHABAMBA</option>
			        <option value="SANTA CRUZ">SANTA CRUZ</option>
			        <option value="CHUQUISACA">CHUQUISACA</option>
			        <option value="BENI">BENI</option>
			        <option value="PANDO">PANDO</option>
			        <option value="TARIJA">TARIJA</option>
			        <option value="POTOSI">POTOSI</option>
			      </select>
		    </div>
		  </div>
		  <div class="form-row">
		  		<div class="form-group col-md-12">
			    <label for="inputMotivo">Motivo por el cual se realizo el inventario</label>
			    <input type="text" class="form-control" id="inputMotivo" name="motivo" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z\s]+$" title="Error! Ejemplo: MANTENIMIENTO" required>
		    </div>
		  </div>
		  <h4 class="subtitulo">II. Datos participantes:</h4>
		    <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputFuncionario">Funcionario CEMAPOL</label>
			      <input type="text"  class="form-control" id="inputFuncionario" name="funcionario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z\s]+$" title="Error! Ejemplo: JUAN CALDERON" required >
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputResponsable">Responsable del vehiculo</label>
			      <input type="text" class="form-control" id="inputResponsable" name="responsable" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z\s]+$" title="Error! Ejemplo: JUAN CALDERON" required>
			    </div>
			</div>
		  <h4 class="subtitulo">III. Estado Actual del Vehiculo:</h4>
		  <div class="form-row">		  		
		  		<div class="form-group col-md-6">
			  		<h6>Sistemas Mecanicos</h6>
				    <div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="s_mecanicos" id="inputSmecanicos1" value="BUENO" required>
					  <label class="form-check-label" for="inputSmecanicos1" >BUENO</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="s_mecanicos" id="inputSmecanicos2" value="REGULAR" >
					  <label class="form-check-label" for="inputSmecanicos2" >REGULAR</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="s_mecanicos" id="inputSmecanicos3" value="DETERIORADO" >
					  <label class="form-check-label" for="inputSmecanicos3" >DETERIORADO</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="s_mecanicos" id="inputSmecanicos4" value="FUERA DE USO" >
					  <label class="form-check-label" for="inputSmecanicos4" >FUERA DE USO</label>
					</div>
		    	</div>
		    	<div class="form-group col-md-6">
			  		<h6>Estructura Metalica</h6>
				    <div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="estructura" id="inputEstructura1" value="BUENO" required >
					  <label class="form-check-label" for="inputEstructura1" >BUENO</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="estructura" id="inputEstructura2" value="REGULAR" >
					  <label class="form-check-label" for="inputEstructura2" >REGULAR</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="estructura" id="inputEstructura3" value="DETERIORADO" >
					  <label class="form-check-label" for="inputEstructura3" >DETERIORADO</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="estructura" id="inputEstructura4" value="FUERA DE USO" >
					  <label class="form-check-label" for="inputEstructura4" >FUERA DE USO</label>
					</div>
		    	</div>
		  </div>
		  <div class="form-row">		  		
		  		<div class="form-group col-md-6">
			  		<h6>Pintura Externa</h6>
				    <div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="pintura" id="inputPintura1" value="BUENO" required>
					  <label class="form-check-label" for="inputPintura1" >BUENO</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="pintura" id="inputPintura2" value="REGULAR" >
					  <label class="form-check-label" for="inputPintura2" >REGULAR</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="pintura" id="inputPintura3" value="DETERIORADO">
					  <label class="form-check-label" for="inputPintura3" >DETERIORADO</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="pintura" id="inputPintura4" value="FUERA DE USO">
					  <label class="form-check-label" for="inputPintura4" >FUERA DE USO</label>
					</div>
		    	</div>		    	
		  </div>


		  <h4 class="subtitulo">IV. Inventario de Partes del Vehiculo:</h4>
		  <div class="form-row">		  		
		  		<div class="form-group col-md-4">
		  			<h6>Vidrios</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="vidrio" id="inputVidrio1" value="SI" required>
					  <label class="form-check-label" for="inputVidrio1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="vidrio" id="inputVidrio2" value="NO">
					  <label class="form-check-label" for="inputVidrio2" >NO</label>
					</div>
		    	</div>	
		    	<div class="form-group col-md-4">
		  			<h6>Retrovidores</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="retrovisor" id="inputRetrovisor1" value="SI" required>
					  <label class="form-check-label" for="inputRetrovisor1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="retrovisor" id="inputRetrovisor2" value="NO">
					  <label class="form-check-label" for="inputRetrovisor2" >NO</label>
					</div>
		    	</div>	
		    	<div class="form-group col-md-4">
		  			<h6>Radio</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="radio" id="inputRadio1" value="SI" required>
					  <label class="form-check-label" for="inputRadio1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="radio" id="inputRadio2" value="NO">
					  <label class="form-check-label" for="inputRadio2" >NO</label>
					</div>
		    	</div>    	
		  </div>


		  <div class="form-row">		  		
		  		<div class="form-group col-md-4">
		  			<h6>Placa de Control</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="placac" id="inputPlacaC1" value="SI" required>
					  <label class="form-check-label" for="inputPlacaC1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="placac" id="inputPlacaC2" value="NO" required>
					  <label class="form-check-label" for="inputPlacaC2" >NO</label>
					</div>
		    	</div>	
		    	<div class="form-group col-md-4">
		  			<h6>Faroles</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="faroles" id="inputFaroles1" value="SI" required>
					  <label class="form-check-label" for="inputFaroles1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="faroles" id="inputFaroles2" value="NO" required>
					  <label class="form-check-label" for="inputFaroles2" >NO</label>
					</div>
		    	</div>	
		    	<div class="form-group col-md-4">
		  			<h6>Guiñadores</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="guiñadores" id="inputGuiñadores1" value="SI" required>
					  <label class="form-check-label" for="inputGuiñadores1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="guiñadores" id="inputGuiñadores2" value="NO" required>
					  <label class="form-check-label" for="inputGuiñadores2" >NO</label>
					</div>
		    	</div>    	
		  </div>


		  <div class="form-row">		  		
		  		<div class="form-group col-md-4">
		  			<h6>Volante</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="volante" id="inputVolantes1" value="SI" required>
					  <label class="form-check-label" for="inputVolantes1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="volante" id="inputVolantes2" value="NO" required>
					  <label class="form-check-label" for="inputVolantes2" >NO</label>
					</div>
		    	</div>	
		    	<div class="form-group col-md-4">
		  			<h6>Palanca</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="palanca" id="inputPalanca1" value="SI" required>
					  <label class="form-check-label" for="inputPalanca1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="palanca" id="inputPalanca2" value="NO" required>
					  <label class="form-check-label" for="inputPalanca2" >NO</label>
					</div>
		    	</div>	
		    	<div class="form-group col-md-4">
		  			<h6>Llantas</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="llantas" id="inputLlantas1" value="SI" required>
					  <label class="form-check-label" for="inputLlantas1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="llantas" id="inputLlantas2" value="NO" required>
					  <label class="form-check-label" for="inputLlantas2" >NO</label>
					</div>
		    	</div>	    	
		  </div>

		  <div class="form-row">		  		
		  		<div class="form-group col-md-4">
		  			<h6>Guarda Fangos</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="guar_fangos" id="inputGua1" value="SI" required>
					  <label class="form-check-label" for="inputGua1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="guar_fangos" id="inputGua2" value="NO" required>
					  <label class="form-check-label" for="inputGua2" >NO</label>
					</div>
		    	</div>	
		    	<div class="form-group col-md-4">
		  			<h6>Limpia Parabrisas</h6>
			  		<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="limp_parabrisas" id="inputParabri1" value="SI" required>
					  <label class="form-check-label" for="inputParabri1" >SI</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="limp_parabrisas" id="inputParabri2" value="NO" required>
					  <label class="form-check-label" for="inputParabri2" >NO</label>
					</div>
		    	</div>	    	
		  </div>
		  <div class="form-group col-md-12">
			<label for="Observaciones">Observaciones Generales</label>
			<textarea type="text" class="form-control" id="Observaciones" rows="3" name="obser" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" pattern="^[A-Z0-9 -?]+$"  title="Ingrese algun tipo de observacion"></textarea>
		  </div>
		   <button type="button" class="btn btn-danger" onclick="location.href='lista_estado.php'">Cancelar</button>
		   <input type="submit" class="btn btn-success" name="inven" value="Siguiente"> 
		   
	</form>
</div>


<?php

?>